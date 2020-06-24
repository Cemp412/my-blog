<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;

class LoginController extends Controller
{
    public function login(Request $request){
     $validator=Validator::make($request->all(),[
    		
    		'email'=>'required',
    		'password'=>'required',
    		
    	]);
    		if($validator->fails())
    	{
    		return response()->json(['error'=>$validator->errors()->all()], 409);
    	}

    	$user =User::where('email',$request->email)->get()->first();
    	$password=decrypt($user->password);
    	if($user && $password==$request->password)
    	{
    		return response()->json(['user'=>$user]);
    	}
    	else
    	{
        
         	return response()->json(['error'=>["oops! Something Going Wrong"]], 409);
        }
    }

    public function registration(Request $request){
    	$validator=Validator::make($request->all(),[
    		'name'=>'required',
    		'email'=>'required|unique:users',
    		'password'=>'required',
    		
    	]);
    	if($validator->fails())
    	{
    		return response()->json(['error'=>$validator->errors()->all()], 409);
    	}

        $p =new User();
        $p->name = $request->name;	
        $p->email = $request->email;
        $p->password = encrypt($request->password);
        
        $p->save();
         
        if($p){
                return response()->json($data=[
                'status'=>200,
                'msg'=>'User Registration Successfull',
                
            ]);
        }
        else{
                return response()->json($data=[
                'status'=>203,
                'msg'=>'something went wrong'
               ]);
            } 
        
    }
}
