<?php


namespace App\Services\Payment\Providers;


use App\Services\Payment\Contracts\AbstractProviderInterface;
use App\Services\Payment\Contracts\PayableInterface;
use App\Services\Payment\Contracts\VerifyInterface;

class IDPayProvider extends AbstractProviderInterface  implements PayableInterface , VerifyInterface
{
     // this idpay provider is payment gateway like zarrinpal , mellat
    public function pay()
    {
      // dd($this->request);
       // dd($this->request->getAmount());
    }

    public function verify()
    {


        $result = '';
        if(isset($result['error_code'])){
            return [
              'status' => false,
              'msg' => $result['error_message'],
            ];
        }
        if($result['status'] == $this->statusOk){
            return [
                'status' => true,
                'data' => $result,
            ];
        }
    }
}
