<?php

namespace App\Http\Controllers\Front\Payment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\Payment\PayRequest;
use App\Mail\SendPurchasedFilesMail;
use App\Services\PaymentService\PaymentService;
use App\Services\PaymentService\Request\IDPayRequest;
use App\Models\Basket;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Services\PaymentService\Request\IDPayVerifyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    //

    public function payment(PayRequest $request)
    {

        $user = Auth::user();
        $basket = Basket::where('user_id', $user->id)->get();
        $order_amount = array_sum(array_column(Basket::where('user_id', $user->id)->get()->toArray(), 'price'));
        try {
            $payment_number = Str::random(20);

            //// create order l.v 1
            $order = Order::updateOrCreate(
                ['user_id' => $user->id, 'order_status' => 0],
                ['amount' => $order_amount,
                    'payment_number' => $payment_number,
                    'order_status' => 0,]);


            //// create order items / details l.v 2
            $orderForOrderItems = $basket->map(function ($items) {
                return $items->only(['user_id', 'product_id', 'price', 'number']);
            });
            $order->orderItems()->createMany($orderForOrderItems->toArray());


            //// create payment l.v 3
            $payment = Payment::create([
                'user_id' => $user->id,
                'order_id' => $order->id,
                'gateway' => 'zarinpal',
                'bank_id' => null,
                'payment_number' => $order->payment_number,
                'amount' => $order->amount,
                'status' => 1,
            ]);

           // return redirect()->back()->with('warning',__('messages.this_part_is_being_prepared'));

            // make gateway instance with arguments
            $idPayRequest = new  IDPayRequest([
                'amount' => $order_amount,
                'user' => $user,
                'orderId' => $order->payment_number,
                'apiKey' => config('services.gateways.id_pay.api_key'),
            ]);

            // pay the payment order
            $paymentService = new PaymentService(PaymentService::IDPAY, $idPayRequest);
            dd($paymentService->pay());
          //  return $paymentService->pay();
        } catch (\Exception $ex) {
           // return  $ex->getMessage();
            return back()->with(['error' => $ex->getMessage()]);
        }
    }

    public function callBack(Request $request)
    {
        $paymentInfo = $request->all();

        // make  verify gateway instance with arguments
        $idPayVerifyRequest = new  IDPayVerifyRequest([
            'apiKey' => config('services.gateways.id_pay.api_key'),
            'id' => $paymentInfo['id'],
            'orderId' => $paymentInfo['order_id'],
        ]);
        $paymentService = new PaymentService(PaymentService::IDPAY, $idPayVerifyRequest);
        $result = $paymentService->verify();
        if(!$result['status']){
            return redirect()->route('cart.check')
                ->with(['error' => 'پرداخت شما انجام نشد']);
        }
        if($result['status'] == 100 or $request['status'] == 101)
        {
        //            return redirect()->route('home')
        //                ->with(['error' => 'پرداخت شما انجام شد.برای دریافت فایل های خود به حساب کاربری مراجعه کنید']);

            $currentPayment =  Payment::where(['payment_number','=',$result['data']['order_id']])->first();
            $currentPayment->update([
                'status' => 2,
                'bank_id' => $result['data']['track_id'],
            ]);

            // get order
            $currentPayment->order()->update([
                'order_status' => 2,
            ]);

            // get order items & link of files
            $purchasedFile  =  $currentPayment->order->orderItems->map(function ($item){
                return  $item->product->source_url;
            });

            $purchasedFiles =  $purchasedFile->toArray();

            // send to user email or display in profile section
            $currentUser =  $currentPayment->order->user;
            // l.v 1
            Mail::to($currentUser->email)->send(new SendPurchasedFilesMail($purchasedFiles,$currentUser));

            // delete data from basket

            return redirect()
                ->route('home')
                ->with(['error' => 'پرداخت شما انجام شد.لینک فایها به ایمیل ارسال شد']);
        }




    }


}
