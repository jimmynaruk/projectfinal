<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
class OrderController extends Controller
{
    

    public function index (Request $request)
    {  
        // dd(session::all());
        $chkGroup = Session::get('chk_groupCode')->group_code;

        if ($chkGroup === 9200) {
            return redirect('main');
        }

        if(Session::get('haslogin') == 0 ){
            
            return redirect('login');
           
        }
        $data = $request->json()->all();
        $sql = "SELECT product_id, product_name, product_price , product_capacity ,product_pic FROM product_detail_tb ";
        
        $dataset['productdetail'] = DB::select($sql);

    
        $sql3 = "SELECT
        fun.function_name,map.group_code,fun.linkfunc,gt.group_name
        FROM
        function_tb fun
        INNER JOIN mapfunc_tb map ON map.function_id = fun.function_id
		INNER JOIN group_tb gt ON map.group_code = gt.group_code 
		WHERE map.group_code = '9300'";
        $dataset['mapfunc'] = DB::select($sql3);
        return view('order',['dataset'=>$dataset]);
      
    }

    public function createOrder(Request $request)
    {
            \Log::info("[".__METHOD__."]"."start");
        try{
            $data = $request->json()->all();
            $product_id = $request->input('checkArr');
            $product_capacity = $request->input('capatxt');
            $username = $request->input('usernametxt');
            $quatity = $request->input('quatxt');
            $price = $request->input('pricedes');
            $total_price = $request->input('total');
            $pickup_date =  $request->input('pickuptxt');
            $pickup =  $request->input('pick');
            $create_date = \Carbon\Carbon::now()->timezone('Asia/Bangkok');
            // \Log::info($product_capacity);
            // \Log::info($product_id);
            // \Log::info($quatity);
            // \Log::info($price);
            //\Log::info($product_id);
            // \Log::info($quatity); 
            $checkstart = $this->checkdate($pickup_date);
            $flag = 1;
            for($x = 0 ; $x < count($product_id); $x++ ){
                $str=$product_id[$x];
                $exp=explode(",",$str);
                $id=$exp[0];
                $index=$exp[1];
                $sql = "SELECT
                oddt.product_id,
                SUM(oddt.quatity) AS Total_Amount
                FROM
                    order_detail_tb oddt
                INNER JOIN  product_detail_tb pdtb ON oddt.product_id = pdtb.product_id
                WHERE pickup_date = '$pickup_date' and oddt.product_id = $id 
                GROUP BY oddt.product_id";
                $dataset = DB::select($sql);
                //\Log::info($quatity[$index]);
                $Total_Amount=$quatity[$index];
                $CheckAmount=  $quatity[$index] ;
                
                if($dataset){
                    $Total_Amount=$Total_Amount+$dataset[0]->Total_Amount;
                    $CheckAmount = 3000 - $dataset[0]->Total_Amount; // จะได้ค่าที่เหลือ
                    \Log::info($CheckAmount);
                }
                if(!$dataset){
                    $CheckAmount = 3000;
                }
                \Log::info($CheckAmount);
                // \Log::info($Total_Amount."xx");
                if($Total_Amount>3000){
                    $flag=0;
                }
            }
           
            if($flag==0){
               throw new  \Exception ("รายการของวันที่ $pickup_date รหัสขนม $id สามารถสั่งได้ $CheckAmount ชิ้น");
             }

            $data = array(
                'username' => $username,
                 'pickup_date' => $pickup_date,
                 'pickup' => $pickup,
                 'status' => 'ยังไม่ชำระเงิน'
            );
            $getIdorderTb = DB::table("order_tb")->insertGetId($data);
            
        
            for($x = 0 ; $x < count($product_id); $x++ ){
                $str=$product_id[$x];
                $exp=explode(",",$str);
                $id=$exp[0];
                $index=$exp[1];
                // $result[$x] =$product_capacity[$index] - $quatity[$x];
                // if($result[$x]<0){
                //         throw new  \Exception ("ขนมไม่พอตามที่ต้องการ จำนวนที่สามารถสั่งได้ของรหัสขนม 
                //         $id จำนวน $product_capacity[$index] ชิ้น ");
                // }
            
            // $check_product_capacity = $this->checkperday($quatity[$index],$product_id,$pickup_date);
            // if($check_product_capacity){
            //     if($check_product_capacity->$quatity[$index]){
            //         if($$quatity[$index] > $product_capacity){
            //             throw new  \Exception ("จำนวนขนมที่สั่งวันที่ $pickup_date เกินกำลังผลิตต่อวัน");
            //         }

            //     }
                
            // }
                $data = array(
                    'product_id' => $id,
                    'username' => $username,
                    'quatity' => $quatity[$index],
                    'price' => $price[$index],
                    'status' => 'รอทำการชำระเงิน',
                    'total_price' =>  $total_price[$index],
                    'pickup_date' => $pickup_date,
                    'create_date' => $create_date,
                    'order_id' => $getIdorderTb
                );
                DB::table("order_detail_tb")->insert( $data);
            
                // $data = array(
                //      'product_capacity' => $result[$x]           
        
                //   );
                 
                //   DB::table("product_detail_tb")->where('product_id','=',$id)->update($data);
                
                  
            }
 
            return \Response::json(['message' => 'บันทึกการทำรายการเรียบร้อยไปสู่หน้าชำระเงิน'], 200);

        }catch(\Exception $e){
        
            \Log::error('[' . __METHOD__ . '][' . $e->getFile() . '][line : ' . $e->getLine() . '][' . $e->getMessage() . ']');

            return \Response::json(['message' => $e->getMessage()], 500);
            
        }
    }
    private function checkperday($quatity,$product_id,$pickup_date){
        
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

    // private function checkamount($quatity,$product_capacity){

    //     $checkamountday = $this->checkperday($quatity,$pickup_date);
    //     if($checkamountday>$product_capacity){
    
    //         throw new  \Exception ("จำนวนการสั่งทำขนมของวันที่ $pickup_date มากกว่าจำนวนรับผลิต");
    //     }
    // }

    // private function checkperday($quatity,$pickup_date){
    //     // \Log::info('getorderid');
    //     $sql = "SELECT quatity FROM order_detail_tb 
    //     where quatity = \"$quatity\" and pickup_date = \"$pickup_date\" ";
        
        
    // }

    private function getorderid($order_id){
        \Log::info('getorderid');
        $data = $request->json()->all();
        $sql = "SELECT * FROM order_tb 
        where order_id = \"$order_id\" ";
        
    }

    // private function getcapacity($product_capacity){
    //     \Log::info('getcapacity');
    //     $sql = "SELECT * FROM product_detail_tb 
    //     where product_capacity = \"$product_capacity\" ";
        
    // }
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
    private function sumOrderdetail($product_capacity,$quatity){
       
         $checkProcapacity = $this->checkcapacity($product_capacity,$quatity);
         if($result =$product_capacity - $quatity){
                
            if($product_capacity < $quatity){
                throw new  \Exception ("ขนมไม่พอตามที่ต้องการ จำนวนที่สามารถสั่งได้ $product_capacity ชิ้น ");
               }
        } 
        $data = array(
            'product_id' => $product_id,
            'product_capacity' => $result
            
        );
   
DB::table('product_detail_tb')->where('product_id','=',$product_id[$x])->update($data); 
      
    }

    private function checkcapacity($product_capacity,$quatity){

            $sql = " SELECT pddtb.product_capacity, odtb.quatity from product_detail_tb pddtb
            inner join order_detail_tb odtb on odtb.product_id = pddtb.product_id
            where product_capacity = \"$product_capacity\"  
            and odtb.quatity = \"$quatity\"";
            $dataset = DB::select($sql);
    
            return $dataset;
    }


    public function findDetaildes(Request $request)
    {

        try{

            $user_id = $request->input('user_id');

            $sql = "SELECT
            dessert_id, dessert_name
        FROM
        dessert_tb";
        
        $result = DB::select($sql);

        return $result;
        }catch  (\Exception $e) {

            \Log::error('[' . __METHOD__ . '][' . $e->getFile() . '][line : ' . $e->getLine() . '][' . $e->getMessage() . ']');
    
            return \Response::json(['message' => $e->getMessage()], 500);
    
        }
    }

    public function findpic(Request $request)
    {
        $product_id = $request->input('product_id');
        log::info($request);
        try{

        $sql = DB::select("SELECT product_id,product_pic
                           FROM product_detail_tb
                           WHERE product_id = $product_id")[0];

        return \Response::json(['sql' => $sql], 200);
        
        //$order_id = DB::table('order_tb')->where('uploadpic')->pluck('order_id');
      
        }catch  (\Exception $e) {

            \Log::error('[' . __METHOD__ . '][' . $e->getFile() . '][line : ' . $e->getLine() . '][' . $e->getMessage() . ']');
    
            return \Response::json(['message' => $e->getMessage()], 500);
    
        }
    }
}


