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
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    //

    public function payment(PayRequest $request)
    {

        $user = Auth::user();

        try {
            // create order
            Order::create([
                'user_id' => $user->id,
                'amount' => $request->amount,
                'order_number' => '',
                'order_status' => 1,
            ]);

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

            dd( $paymentService->pay());
        }catch (\Exception $ex){
            return back()->with(['error' => $ex->getMessage()]);
        }


    }


}
