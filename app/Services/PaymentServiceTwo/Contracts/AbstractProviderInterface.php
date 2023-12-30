<?php


namespace App\Services\PaymentServiceTwo\Contracts;


abstract class AbstractProviderInterface
{
    protected $request;
    public function __construct(RequestInterface $request)
    {
        $this->request = $request;
    }
}
