<?php

namespace App\Http\Controllers\Front\Payment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\Payment\PayRequest;
use App\Services\Payment\PaymentServices;
use App\Services\Payment\Request\IDPayRequest;
use App\Models\Basket;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            $order_number = Str::random(30);
            // create order
            $order = Order::updateOrCreate(
                ['user_id' => $user->id, 'order_status' => 0],
                ['amount' => $request->amount,
                    'order_number' => $order_number,
                    'order_status' => 0,]);
            dd($order);

            // create order details
            OrderItem::create([

            ]);


            // create payment
            Payment::create([

            ]);

            $idPayRequest = new  IDPayRequest([
                'amount' => 1000,
                'user' => $user,
            ]);
            $paymentService = new PaymentServices(PaymentServices::IDPAY, $idPayRequest);
            // $paymentService->pay();

            dd($paymentService->pay());
        } catch (\Exception $ex) {
            return back()->with(['error' => $ex->getMessage()]);
        }


    }


}
