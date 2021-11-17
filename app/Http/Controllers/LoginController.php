<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(Request $request)
    {   
        Session::put('haslogin',0);

        return view('login');

    }

    
    public function checkusernamepassword(Request $request){
        \Log::info("[".__METHOD__."]"."start");
      try{
        $username = $request->input('idtxt');
        $password = $request->input('passtxt');
       
        $check_username_password =  $this->usernamepassword($username,$password);
        \Log::info($check_username_password);
      
        if(empty($check_username_password)){
            Session::put('haslogin',0);
            
           
            throw new  \Exception("ไม่พบบัญชีผู้ใช้");
           
        }
        $func_id = $this->getgroupmenu($check_username_password[0]->group_code);
       
        $func_menu = $this->getfuncmenu($func_id);

        
        $chk_groupCode = DB::table('user_tb')->select('group_code')->where('username',$username)->first();
        \Log::info($password);
        \Log::info($username);
        $userId = $this->getuserid($username,$password);

        Session::put('getIdUser',$userId);
        Session::put('getuser',$username);
        Session::put('haslogin',1);
        Session::put('menu',$func_menu);
        Session::put('chk_groupCode',$chk_groupCode);
        
        if(Session::get('haslogin') == 0 ){
            
            return Redirect::to('home');
           
        }
        return \Response::json(['message' => "เข้าสู่ระบบเรียบร้อย"]);
        }catch(\Exception $e){
    
            \Log::error('[' . __METHOD__ . '][' . $e->getFile() . '][line : ' . $e->getLine() . '][' . $e->getMessage() . ']');

            return \Response::json(['message' => $e->getMessage()], 500);
            
        }

    }


    public function usernamepassword($username,$password)
    {

        $sql = "select * from user_tb
            where username = \"$username\"
            and password = \"$password\"";
            
        $dataset = DB::select($sql);
       
        return $dataset;
    }

    public function getuserid($username,$password)
    {

        $sql = "SELECT user_id from user_tb WHERE username = '$username' and password = '$password' ";
        \Log::info($sql);
        $getIdUser = DB::select($sql)[0]->user_id;
        \Log::info($getIdUser);
        return $getIdUser;
    }

 
    public function getgroupmenu($group_code)
    {

        $sql = "SELECT * from mapfunc_tb WHERE group_code = '$group_code'";
            
        $dataset = DB::select($sql);

        return $dataset;
    }


    public function getfuncmenu($function_id)
    {   
        $id = "";
        for($i=0; $i<count($function_id); $i++){

            if($i>=1){
                $id .= ",";
            }
            $id .= $function_id[$i]->function_id;

        }

        $sql = "SELECT * from function_tb WHERE function_id in ('$id')";
       
        $dataset = DB::select($sql);

        return $dataset;
    }

    



    
}
