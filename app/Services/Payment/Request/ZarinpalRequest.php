<?php


namespace App\Services\Payment\Request;


use App\Services\Payment\Contracts\RequestInterface;

class ZarinpalRequest implements RequestInterface
{
    private $user;
    private $amount;

    public function __construct(array $data)
    {
        $this->user = $data['user'];
        $this->amount = $data['amount'];
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