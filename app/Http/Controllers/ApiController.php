<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
Use Carbon\Carbon;
use Endroid\QrCode\QrCode;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApiController extends Controller
{
   
    public function createOrder(Request $request)
    {
            \Log::info("[".__METHOD__."]"."start");

           
        try{
            $data = $request->json()->all();
            $product_id = $data['product_id'];
            $username = $data['username'];
            $quatity = $data['quatity'];
            $price = $data['price'];
            $total_price = $data['total_price'];
            $pickup_date = $data['pickup_date'];
            $create_date = \Carbon\Carbon::now()->timezone('Asia/Bangkok');

            $checkstart = $this->checkdate($pickup_date);
    
            $data = array(
                'product_id' => $product_id,
                'username' => $username,
                'price' => $price,
                'quatity' => $quatity,
                'total_price' => $result,
                'create_date' => $create_date

            );
       
            DB::table("order_detail_tb")->insert( $data);
           
           if($result = sum($total_price)){

           
        }
        $data = array(
            'username' => $username,
            'total_price' => $result,
             'pickup_date' => $pickup_date,
             'status' => 'ยังไม่ชำระเงิน'
        );
        DB::table("order_tb")->insert($data);
         return \Response::json(['message' => 'บันทึกการทำรายการเรียบร้อยไปสู่หน้าชำระเงิน'], 200);

        }catch(\Exception $e){
        
            \Log::error('[' . __METHOD__ . '][' . $e->getFile() . '][line : ' . $e->getLine() . '][' . $e->getMessage() . ']');

            return \Response::json(['message' => $e->getMessage()], 500);
            
        }
    }

    private function checkdate($pickup_date){
        \Log::info('checkdatetime');

        $timenow = \Carbon\Carbon::now()->timezone('Asia/Bangkok');
        \Log::info($timenow);
        
        $time2 = new \DateTime($pickup_date,new \DateTimeZone('Asia/Bangkok'));
        
        $interval = $timenow->diff($time2);
        \Log::info(json_encode($interval));
        if($interval->invert == 1 ){
            
            if($interval->d > 0){
            throw new  \Exception ("ห้ามจองย้อนเวลาปัจจุบัน");
            }elseif($interval->d == 0){ 
                throw new  \Exception("จองล่วงหน้า1วัน");
            }
        }elseif($interval->invert == 0 ){
            
            if($interval->d > 0){
           
            }
        }
        
    }
    public function checkamount(Request $request){
        \Log::info("[".__METHOD__."]"."start");

           
        try{
            $data = $request->json()->all();
        
            $quatity = $data['quatity'];
            $product_id = $data['product_id'];
            $pickup_date = $data['pickup_date'];
            $product_capacity = $data['product_capacity'];

            $checkall = $this->checkperday($quatity,$product_id,$pickup_date);
            \Log::info($checkall);
            if($quatity>$product_capacity){
        
                throw new  \Exception ("จำนวนการสั่งทำขนมของวันที่ $pickup_date มากกว่าจำนวนรับผลิต");
            }
            $data = array(
                'pickup_date' => $pickup_date,
                'quatity' => $quatity

            );
       
            DB::table("order_detail_tb")->insert( $data);
           
       
         return \Response::json(['message' => 'บันทึกการทำรายการเรียบร้อยไปสู่หน้าชำระเงิน'], 200);

        }catch(\Exception $e){
        
            \Log::error('[' . __METHOD__ . '][' . $e->getFile() . '][line : ' . $e->getLine() . '][' . $e->getMessage() . ']');

            return \Response::json(['message' => $e->getMessage()], 500);
            
        }
       
       
    }

    private function checkperday($quatity,$product_id,$pickup_date){
        // \Log::info('checkperday');
        $sql = "SELECT
        oddt.product_id,
        oddt.pickup_date,
        SUM(oddt.quatity) AS Total_Amount
        FROM
            order_detail_tb oddt
        INNER JOIN  product_detail_tb pdtb ON oddt.product_id = pdtb.product_id
        WHERE pickup_date = CURDATE()
        GROUP BY oddt.product_id";
    }

    public function sumprice(Request $request){
        \Log::info("[".__METHOD__."]"."start");
       
        $product_price = $data['product_price'];
        $quatity = $data['quatity'];

  try{
 
        

    
    
       
       
        }catch(\Exception $e){
    
            \Log::error('[' . __METHOD__ . '][' . $e->getFile() . '][line : ' . $e->getLine() . '][' . $e->getMessage() . ']');

            return \Response::json(['message' => $e->getMessage()], 500);
            
        }
    }
    public function checkstock(Request $request){
        try{

            $data = $request->json()->all();
        //    \Log::info("[".__METHOD__."]"."start");
          
            $ing_id = $data['ing_id'];
            $capacity = $data['capacity'];
            $used = $data['used'];
            \Log::info($data);
         if($result =$capacity - $used){

            if($capacity < $used){
                throw new  \Exception ("ขนมไม่พอตามที่ต้องการ จำนวนที่สามารถสั่งได้ $capacity ชิ้น ");
               }
        }
         
           
             $data = array(
             'capacity' => $result           

          );
        
          DB::table("stock_tb")->where('ing_id','=',$ing_id)->update($data); 
       
            return \Response::json(['message' => 'Update Stock'], 200);
        
        }catch(\Exception $e){
    
            \Log::error('[' . __METHOD__ . '][' . $e->getFile() . '][line : ' . $e->getLine() . '][' . $e->getMessage() . ']');
    
            return \Response::json(['message' => $e->getMessage()], 500);
            
        }
    }

    public function sumOrderdetail(Request $request){
        try{

            $data = $request->json()->all();
        //    \Log::info("[".__METHOD__."]"."start");
          
            $total_price = $data['total_price'];
            $price = $data['price'];
            \Log::info($data);
         if($result =$price - $total_price){

            if($capacity < $used){
                throw new  \Exception ("ขนมไม่พอตามที่ต้องการ จำนวนที่สามารถสั่งได้ $capacity ชิ้น ");
               }
        }
           
             $data = array(
             'capacity' => $result           

          );
        
          DB::table("stock_tb")->where('stock_id','=',$stock_id)->update($data); 
       
            return \Response::json(['message' => 'Update Stock'], 200);
        
        }catch(\Exception $e){
    
            \Log::error('[' . __METHOD__ . '][' . $e->getFile() . '][line : ' . $e->getLine() . '][' . $e->getMessage() . ']');
    
            return \Response::json(['message' => $e->getMessage()], 500);
            
        }
    }
    // public function checkstock(Request $request){
    //     \Log::info("[".__METHOD__."]"."start");
    //     try{ 

    //     $stock_id = $data['stock_id'];
    //     $capacity = $data['capacity'];
        

       
    //     $data = array(
    //         'capacity' => $capacity
            
    //     );
   
    //     $result = DB::table('stock_tb')->where('stock_id','=',$stock_id)->update($data); 
    //     return \Response::json(['message' => 'อัพเดตคลังแล้ว'], 200);

    //     }catch(\Exception $e){
    
    //         \Log::error('[' . __METHOD__ . '][' . $e->getFile() . '][line : ' . $e->getLine() . '][' . $e->getMessage() . ']');

    //         return \Response::json(['message' => $e->getMessage()], 500);
            
    //     }
    // }
    private function checkstock_id($stock_id){
        $sql = "select * from stock_tb
        where stock_id = \"$stock_id\"";
        $dataset = DB::select($sql);

        return $dataset;
      
    }
}
