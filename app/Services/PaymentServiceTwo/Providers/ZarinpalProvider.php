<?php


namespace App\Services\PaymentServiceTwo\Providers;


use App\Services\PaymentServiceTwo\Contracts\AbstractProviderConstructor;
use App\Services\PaymentServiceTwo\Contracts\PayableInterface;
use App\Services\PaymentServiceTwo\Contracts\RequestInterface;
use App\Services\PaymentServiceTwo\Contracts\VerifyInterface;

class ZarinpalProvider extends AbstractProviderConstructor implements PayableInterface , VerifyInterface
{


    public function pay()
    {

    }

    public function verify()
    {

    }
}
