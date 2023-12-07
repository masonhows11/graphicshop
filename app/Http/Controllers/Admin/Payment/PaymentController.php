<?php

namespace App\Http\Controllers\Admin\Payment;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //

    public function index()
    {
        return view('dash.payment.index')->with(['payments' => Payment::paginate(20)]);
    }

    public function canceled(Payment $payment)
    {
        $payment->status = 2;
        $payment->save();
        session()->flash('success', __('messages.The_changes_were_made_successfully'));
        return redirect()->route('admin.payments.all.index');
    }

    public function retuned(Payment $payment)
    {
        $payment->status = 3;
        $payment->save();
        session()->flash('success', __('messages.The_changes_were_made_successfully'));
        return redirect()->route('admin.payments.all.index');
    }

    public function show(Payment $payment){

        return view('dash.payment.payment',['payment'=>$payment]);
    }


}
