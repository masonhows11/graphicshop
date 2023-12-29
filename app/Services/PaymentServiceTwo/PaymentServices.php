<?php


namespace App\Services\PaymentServiceTwo;

use App\Services\PaymentServiceTwo\Contracts\RequestInterface;
use App\Services\PaymentServiceTwo\Exceptions\ProviderNotFoundException;
use App\Services\PaymentServiceTwo\Request\IDPayRequest;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Config;

class PaymentServices
{

    public const IDPAY = 'IDPayProvider';
    public const ZARRINPAL = 'ZarinpalProvider';

    private string $provider_name;
    private RequestInterface $request;

    public function __construct(string $provider_name, RequestInterface $request)
    {
        $this->provider_name = $provider_name;
        $this->request = $request;
    }

    private function findProvider()
    {
        $providerClassName = 'App\\Services\\Payment\\Providers\\' . $this->provider_name;
        if (!class_exists($providerClassName)) {
            throw new ProviderNotFoundException(__('messages.the_selected_payment_gateway_could_not_be_found'));
        }
        // create an instance founded class
        // past request to construct that made as abstract class for gateway providers
        return new $providerClassName($this->request);
    }


    public function pay()
    {
        try {
            // the pay() method is defined in interface
            return $this->findProvider()->pay();
        } catch (ProviderNotFoundException $e) {
            return $e->getMessage();
        }
    }


    public function verify(){
        try {
            // the pay() method is defined in interface
            return $this->findProvider()->verify();
        } catch (ProviderNotFoundException $e) {
            return $e->getMessage();
        }
    }

}

