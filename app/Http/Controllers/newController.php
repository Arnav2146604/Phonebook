<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Number;
use App\Http\Resources\sdeleteResource;


class newController extends Controller
{
    //
    public function printDeleted(){
        // echo (Number::onlyTrashed()->get());
        // return new sdeleteResource(Number::onlyTrashed()->get());
        // $data = Number::onlyTrashed()->get();
         
        return sdeleteResource::collection(Number::onlyTrashed()->get());
    }
}
