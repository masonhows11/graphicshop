<?php


namespace App\Services\Payment\Providers;


use App\Services\Payment\Contracts\AbstractProviderInterface;
use App\Services\Payment\Contracts\PayableInterface;
use App\Services\Payment\Contracts\RequestInterface;
use App\Services\Payment\Contracts\VerifyInterface;

class ZarinpalProvider extends AbstractProviderInterface implements PayableInterface , VerifyInterface
{


    public function pay()
    {
        // TODO: Implement pay() method.
    }

    public function verify()
    {
        // TODO: Implement verify() method.
    }
}
