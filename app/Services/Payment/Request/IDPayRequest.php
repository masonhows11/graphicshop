<?php


namespace App\Services\Payment\Request;


use App\Services\Payment\Contracts\RequestInterface;

class IDPayRequest implements RequestInterface
{
    private $user;
    private $amount;
    private $orderId;
    private $apiKey;
    public function __construct(array $data)
    {
        $this->user = $data['user'];
        $this->amount = $data['amount'];
        $this->orderId = $data['orderId'];
        $this->apiKey = $data['apiKey'];
    }

    public function getOrderId()
    {
        return $this->orderId;
    }

    public function getAmount()
    {
        return $this->amount;
    }
    public function getUser()
    {
        return $this->user;
    }

}
