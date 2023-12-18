<?php


namespace App\Services\Payment\Providers;


use App\Services\Payment\Contracts\PayableInterface;
use App\Services\Payment\Contracts\VerifyInterface;

class IDPayProvider implements PayableInterface , VerifyInterface
{
     // this idpay  is payment gateway like zarrinpal , mellat

    public function pay()
    {
        // TODO: Implement pay() method.
    }

    public function verify()
    {
        // TODO: Implement verify() method.
    }
}
