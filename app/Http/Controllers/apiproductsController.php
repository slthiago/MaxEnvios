<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class apiproductsController extends Controller
{
    public function index($token_user){
        //$response = Http::get('http://app.evipes.com/api/v1/products?api_token=zfbbK4BNTVevuFnxstqrnXEYfExjCZf4V8Ti7yZiM62UPMCvkwbQRQFAg2DqYNoWuN7ln6iFp5Fw3IpG');

        
        dd($token_user);
    }
}
