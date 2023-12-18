<?php

namespace App\Http\Controllers\Front\Payment;

use App\Http\Controllers\Controller;
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

    public function payment()
    {
        $user = Auth::user();

        try {
            // create order

            // create order details

            // create payment

            $idPayRequest = new  IDPayRequest([
                'amount' => 1000,
                'user' => $user,
            ]);
            $paymentService = new PaymentServices(PaymentServices::IDPAY, $idPayRequest);
            // $paymentService->pay();

            dd( $paymentService->pay());
        }catch (\Exception $ex){
            return view('errors_custom.general_error')
                ->with(['error' => $ex->getMessage()]);
        }


    }


}
