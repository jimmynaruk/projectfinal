<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CreateAccEmpController extends Controller
{
    

    public function index (Request $request)
    {
        if(Session::get('haslogin') == 0 ){
            
            return view('login');
           
        }

        $sql = " select * from user_tb ";
        $dataset['addem'] = DB::select($sql);

        $group_code = $request->input('group_code');
        $sql3 = "SELECT
        fun.function_name,map.group_code,fun.linkfunc,gt.group_name
        FROM
        function_tb fun
        INNER JOIN mapfunc_tb map ON map.function_id = fun.function_id
        INNER JOIN group_tb gt ON map.group_code = gt.group_code 
        WHERE map.group_code = '9100'";
        $dataset['mapfunc'] = DB::select($sql3);
       

        $sql = " SELECT
        *
        FROM
            group_tb
        WHERE
            group_code = '9200'
        OR group_code = '9400' ";
        $dataset['selectgroup'] = DB::select($sql);
        return view('CreateAccEmp',['dataset'=>$dataset]);
    }

    public function saveEmploy(Request $request){
        try{

            $data = $request->json()->all();
        //    \Log::info("[".__METHOD__."]"."start");
       
            $group_code = $request->input('grouptxt');
            $username = $request->input('empusername');
            $password = $request->input('emppass');
            $firstname = $request->input('empfname');
            $lastname = $request->input('emplname');
            $tel = $request->input('emptel');
               
                $data = array('group_code' => $group_code,
                'username' => $username,
                'password' => $password,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'tel' => $tel,
            );
                DB::table("user_tb")->insert( $data); 

            return \Response::json(['message' => 'สร้างชัญชีพนักงานแล้ว'], 200);
        
        }catch(\Exception $e){
    
            \Log::error('[' . __METHOD__ . '][' . $e->getFile() . '][line : ' . $e->getLine() . '][' . $e->getMessage() . ']');

            return \Response::json(['message' => $e->getMessage()], 500);
            
        }
    }

}


