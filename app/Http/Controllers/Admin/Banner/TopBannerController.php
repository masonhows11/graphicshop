<?php

namespace App\Http\Controllers\Admin\Banner;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TopBannerController extends Controller
{


    public function create()
    {
        return view('dash.top_banner.create');
    }

    public function store(Request $request)
    {
        try {

            session()->flash('success',__('messages.New_record_saved_successfully'));
            return redirect()->route('admin.top.banner.index');
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
            return redirect()->route('admin.top.banner.index');
        }catch (\Exception $ex){
            return view('errors_custom.model_store_error');
        }
    }
}
