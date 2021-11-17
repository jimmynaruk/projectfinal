<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class PaymantUploadController extends Controller
{
    
    public function index (Request $request)
    {  
        $data = $request->json()->all();
        $sql = "SELECT order_id,username,status,
        pickup_date,uploadpic
         FROM order_tb 
        where status = 'ยังไม่ชำระเงิน' 
        Order by pickup_date";

        $dataset['orderupid'] = DB::select($sql);

        return view('payment',['dataset'=>$dataset]);
        
    }

    public function imageUploadPost(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
      
        $imageName = $request->image->getClientOriginalName();
   
        $request->image->move(public_path('img/images'), $imageName);
   
        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);
   
    }
   
    public function savepic(Request $request)
    {
            \Log::info("[".__METHOD__."]"."start");
        try{
            $data = $request->json()->all();

            $order_id = $request->input('selectpictxt');
            $uploadpic = $request->input('file');
            $str_arry=explode("\\",$uploadpic);
            $len = count($str_arry);
            $uploadpic=$str_arry[$len-1];

            $data = array('order_id' => $order_id,
                'uploadpic' => $uploadpic,
                'status' => 'รอการตรวจสอบ'
             );
            
             
             $result = DB::table('order_tb')->where('order_id','=',$order_id)->update($data);

            return \Response::json(['message' => 'บันทึกรูปเรียบร้อย'], 200);

        }catch(\Exception $e){
        
            \Log::error('[' . __METHOD__ . '][' . $e->getFile() . '][line : ' . $e->getLine() . '][' . $e->getMessage() . ']');

            return \Response::json(['message' => $e->getMessage()], 500);
            
        }
    }
}

  

