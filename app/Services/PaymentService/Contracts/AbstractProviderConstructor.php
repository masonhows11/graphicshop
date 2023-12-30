<?php


namespace App\Services\PaymentService\Contracts;


// make constructor for all payment providers
abstract class AbstractProviderConstructor
{
    protected $request;
    public function __construct(RequestInterface $request)
    {
        $this->request = $request;
    }
}
