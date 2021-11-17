<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RegisController extends Controller
{
    public function index(Request $request)
    {   
        Session::put('haslogin',0);
       
        return view('register');

    }

    public function createUser(Request $request)
    {
            \Log::info("[".__METHOD__."]"."start");
        try{
            $data = $request->json()->all();

            $username = $request->input('usernametxt');
            $password = $request->input('passtxt');
            $firstname = $request->input('nametxt');
            $lastname = $request->input('lastnametxt');
            $tel = $request->input('teltxt');
            $ShippingAdress = $request->input('shiptxt');
            $checklogin = $this->check_username($username);
           
            $data = array('username' => $username,
            'password' => $password,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'tel' => $tel,
            'ShippingAdress' => $ShippingAdress,
            'group_code' => 9300
             );
            
            
             DB::table("user_tb")->insert( $data);
        //    DB::table("user_tb")->insert( $data);
          

            return \Response::json(['message' => 'สมัครสมาชิกเรียบร้อยแล้ว'], 200);

        }catch(\Exception $e){
        
            \Log::error('[' . __METHOD__ . '][' . $e->getFile() . '][line : ' . $e->getLine() . '][' . $e->getMessage() . ']');

            return \Response::json(['message' => $e->getMessage()], 500);
            
        }
    }
   
    public function check_username($username){


        $checkusername_sql =  $this->sql_check_username($username);
        if($checkusername_sql){

            throw new  \Exception("Username นี้ถูกใช้แล้ว");

        }else{
        
        }

    }
    public function sql_check_username($username){
        $sql = "select username from user_tb
        where username = \"$username\"";
        $dataset= DB::select($sql);

        return $dataset;
    }
   
    // private function checkemptyuserid($user_id)
    // {

    //     $sql = "select user_id  from user_tb
    //         where  user_id = \"$user_id\"";
    //         $dataset= DB::select($sql);
    

    //         return $dataset;
       
    // }

   
  
    
}
