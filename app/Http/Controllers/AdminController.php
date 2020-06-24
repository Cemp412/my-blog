<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;

class AdminController extends Controller
{   
    public function dashboard(){
    	return view('admin.dashboard');
    }

    public function login(Request $request)
    {
    	if($request->isMethod('post')){
    		$data = $request->input();
    		if(Auth::attempt(['email' =>$data['email'],  'password' =>$data['password']])){
    			return redirect('/admindashboard');
    		}
    		else{
    			return redirect('/admin')->with('flash_message_errror', 'Inavalid username or password');
    		}
    	}

    return view('admin.login');
    }

    public function logout()
    {
    	session::flush();
    	return redirect('/admin')->with('flash_message_success', 'Logout sucessfully');
    }
}
