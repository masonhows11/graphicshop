<?php


namespace App\Services\PaymentServiceTwo\Providers;


use App\Services\PaymentServiceTwo\Contracts\AbstractProviderConstructor;
use App\Services\PaymentServiceTwo\Contracts\PayableInterface;
use App\Services\PaymentServiceTwo\Contracts\VerifyInterface;

// this idpay provider is payment gateway like zarrinpal , mellat
class IDPayProvider extends AbstractProviderConstructor implements PayableInterface, VerifyInterface
{

    public function pay()
    {
        // dd($this->request);
        // dd($this->request->getAmount());
    }

    public function verify()
    {

        $result = '';
        if (isset($result['error_code'])) {
            return [
                'status' => false,
                'statusCode' => $result['error_code'],
                'msg' => $result['error_message'],
            ];
        }
        if ($result['status'] == $this->statusOk) {
            return [
                'status' => true,
                'statusCode' => $result['status'],
                'data' => $result,
            ];
        }
        return [
            'status' => true,
            'statusCode' => $result['status'],
            'data' => $result,
        ];
    }
}
