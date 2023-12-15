<?php

namespace App\Http\Controllers\Admin\Banner;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest\BannerRequest;
use App\Http\Requests\BannerRequest\EditBannerRequest;
use App\Models\bottomTwoBanner;
use App\Services\Image\ImageServiceSave;
use Illuminate\Http\Request;


class BottomBannerController extends Controller
{
    public function create()
    {
        return view('dash.bottom_banner.create');
    }

    public function store(Request $request)
    {
        try {


            session()->flash('success',__('messages.New_record_saved_successfully'));
            return redirect()->route('');
        }catch (\Exception $ex){
            return view('errors_custom.model_store_error');
        }


    }

    public function edit(Request $banner){
        return view('');
    }


    public function update(Request $request){

        try {
            session()->flash('success',__('messages.The_update_was_completed_successfully'));
        }catch (\Exception $ex){
            return view('errors_custom.model_store_error');
        }
    }
}
