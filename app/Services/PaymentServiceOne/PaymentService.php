<?php


namespace App\Services\PaymentServiceOne;


use Illuminate\Support\Facades\Config;

class PaymentService
{
    public function zarinpal()
    {
        $amount = 0;
        $merchantId = Config::get('Payment.zarinpal_sandbox_merchantId');
    }

}
