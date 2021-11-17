<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class getimagewithidController extends Controller
{
    public function index (Request $request)
    {   
        
       
        return view('paymentupdate');


    }
    
    public function show($order_id)
    {
        $order = order::find($order_id);
        $uploadpic = image::where('order_id', $order->order_id)->get();
        return view('paymentupdate', compact('order', 'uploadpic'));
    }
    
   
   
}


