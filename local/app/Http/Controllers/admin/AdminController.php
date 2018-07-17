<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use App\Http\Requests;

class AdminController extends Controller
{
    
    
    
    
    public function postLogin(Request $r){
        $admin=auth()->guard('admins');
        
        if($admin->attempt(['username'=>$r->input('username'),'password'=>$r->input('password')]))
        {
            return redirect()->intended('admin');
        }
        else{
         session()->push('m','اسم مستخدم او رقم سري غير صحيح ');   
            return redirect('admin/login');
        }
    }
    
    function getLogin(){
        return view("admin/auth/login");
    }
    
     public function getLogout(){
		auth()->guard('admins')->logout();
		return redirect('/admin/login');
	}
}
