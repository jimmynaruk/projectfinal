<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class manageProductController extends Controller
{
    

    public function index (Request $request)
    {  
       
        $data = $request->json()->all();
        $sql = "SELECT  * from product_detail_tb ";

        $dataset['datadessert'] = DB::select($sql);
    
        return view('manage_dessert',['dataset'=>$dataset]);
    }

    public function imageUpload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $imageName = $request->image->getClientOriginalName();
   
        $request->image->move(public_path('img/imgDessert'), $imageName);
   
        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);
   
    }

    public function saveMangeProduct(Request $request)
    {
            \Log::info("[".__METHOD__."]"."start");
        try{
            $data = $request->json()->all();

            $product_name = $request->input('txtnamedes');
            $product_price = $request->input('txtprice');
            $product_capacity = $request->input('txtperday');
            $data = array('product_name' => $product_name,
            'product_price' => $product_price,
            'product_capacity' => $product_capacity
             );
            
            
             DB::table("product_detail_tb")->insert( $data);
          

            return \Response::json(['message' => 'บันทึกการทำรายการเรียบร้อย'], 200);

        }catch(\Exception $e){
        
            \Log::error('[' . __METHOD__ . '][' . $e->getFile() . '][line : ' . $e->getLine() . '][' . $e->getMessage() . ']');

            return \Response::json(['message' => $e->getMessage()], 500);
            
        }
    }

   
    public function EditProduct(Request $request)
    {
        \Log::info("[".__METHOD__."]"."start");
        try{
            
            $product_id = $request->input('idtxt');
            $product_name = $request->input('nametxt');
            $product_price = $request->input('pricetxt');
            $product_capacity = $request->input('amounttxt');
            // \Log::info("user_id: ".$user_id.
            // " password: ".$password.
            // " user_email: ".$user_email               
    
                
            $data = array('product_id' => $product_id,
            'product_name' => $product_name,
            'product_price' => $product_price,
            'product_capacity' => $product_capacity
            );

            DB::table('product_detail_tb')->where('product_id','=',$product_id)->update($data);
        
            
        return \Response::json(['message' => 'อัปเดตสต๊อกส่วนผสมแล้ว'], 200);
        } catch (\Exception $e) {

        \Log::error('[' . __METHOD__ . '][' . $e->getFile() . '][line : ' . $e->getLine() . '][' . $e->getMessage() . ']');

        return \Response::json(['message' => $e->getMessage()], 500);
    }
    }

    public function savepic(Request $request)
    {
            \Log::info("[".__METHOD__."]"."start");
        try{
            $data = $request->json()->all();

            $product_id = $request->input('productidpic');
            $product_pic = $request->input('file');
            $str_arry=explode("\\",$product_pic);
            $len = count($str_arry);
            $product_pic=$str_arry[$len-1];

            $data = array('product_id' => $product_id,
                'product_pic' => $product_pic
             );
            
             
             $result = DB::table('product_detail_tb')->where('product_id','=',$product_id)->update($data);

            return \Response::json(['message' => 'บันทึกรูปเรียบร้อย'], 200);

        }catch(\Exception $e){
        
            \Log::error('[' . __METHOD__ . '][' . $e->getFile() . '][line : ' . $e->getLine() . '][' . $e->getMessage() . ']');

            return \Response::json(['message' => $e->getMessage()], 500);
            
        }
    }
   
    public function finddataProduct(Request $request)
    {

        try{
            $product_id = $request->input('product_id');

            $sql = "SELECT * FROM product_detail_tb 
                    WHERE product_id = '$product_id'";

        $result = DB::select($sql);

            return $result;
        }catch  (\Exception $e) {

            \Log::error('[' . __METHOD__ . '][' . $e->getFile() . '][line : ' . $e->getLine() . '][' . $e->getMessage() . ']');
    
            return \Response::json(['message' => $e->getMessage()], 500);
    
        }
    }

  

    public function deleteProduct(Request $request)
    {   
        try{
            \Log::info("start ");
           
            $product_id = $request->input('product_id');
          
            $result = DB::table('product_detail_tb')->where('product_id',$product_id)->delete();
            
            
            if( $result == null || empty($result) || $result == "" ) {
            throw new  \Exception(" Data not found.");
        }
        
        return \Response::json(['message' => 'Delete Complete'], 200);
        
         } catch (\Exception $e) {

        \Log::error('[' . __METHOD__ . '][' . $e->getFile() . '][line : ' . $e->getLine() . '][' . $e->getMessage() . ']');

        return \Response::json(['message' => $e->getMessage()], 500);

    }
    
    }

}


