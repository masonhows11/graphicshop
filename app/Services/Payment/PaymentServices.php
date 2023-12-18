<?php


namespace App\Services\Payment;

use App\Services\Payment\Contracts\RequestInterface;
use App\Services\Payment\Request\IDPayRequest;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Config;

class PaymentServices
{

    public const IDPAY = 'IDPayProvider';
    public const ZARRINPAL = 'ZarrinpalProvider';

    private string $provider_name;
    private RequestInterface $request;

    public function __construct(string $provider_name, RequestInterface $request)
    {
        $this->provider_name = $provider_name;
        $this->request = $request;
    }

    private function findProvider()
    {
        $baseNameSpace = 'App\\Services\\Payment\\Providers\\' . $this->provider_name;
        if(class_exists($baseNameSpace)){

        }
    }


    public function pay()
    {

    }

}

    //    $idPayRequest = new  IDPayRequest();
    //    $paymentService = new PaymentServices(PaymentServices::IDPAY,$idPayRequest);
