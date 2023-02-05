<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function AuthLogin(){
        $admin_id = Session::get('id_admin');
        if($admin_id){
            return Redirect::to('admin.dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function __invoke(Request $request)
    {
        //
    }

    public function index(){
        return view('admin_login');
    }
    
    public function showdashboard(){
   
        
            return view('admin.dashboard');
    }

    public function dashboard(Request $request){
        $admin_email = $request->email;
        $admin_pass = md5($request->password);
        $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_pass', $admin_pass)->first();
        if($result){
            // $request->session()->get('admin_name',)
            Session::put('admin_name',$result->admin_name);
            Session::put('id_admin', $result->id);
            return Redirect::to('admin/dashboard');
        }else{
            Session::put('message', 'Mat khau khong dung');
            return Redirect('/admin');
        }
        // return view('admin/dashboard');
    }

    public function logout(){      
        // return Session::get('admin_name');
        $this->AuthLogin();
        Session::put('admin_name',null);
        Session::put('id',null);
        return Redirect::to('/admin');
    }
}
