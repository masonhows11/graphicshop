<?php


namespace App\Services\PaymentServiceTwo\Contracts;


abstract class AbstractProviderInterface
{
    public function __construct(protected RequestInterface $request)
    {

    }
}
