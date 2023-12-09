<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminProductController extends Controller
{



    public function create()
    {
        return view('admin.product.create');
    }

    public function store(Request $request)
    {
        try {

        }catch (\Exception $ex){

        }
    }


    public function edit(Request $request)
    {
        return view('admin.product.edit');
    }

    public function update(Request $request)
    {
        try {

        }catch (\Exception $ex){

        }
    }


}
