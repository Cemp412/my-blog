<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Product;

class ProductController extends Controller
{
    public function add(Request $request){
        header("Access-Control-Allow-Origin: *");
    	$validator=Validator::make($request->all(),[
    		'name'=>'required',
    		'category'=>'required',
    		'brand'=>'required',
    		'desc'=>'required',
    		'image'=>'required',
    		'price'=>'required',
    	]);

    	if($validator->fails())
    	{
    		return response()->json(['error'=>$validator->errors()->all()], 409);
    	}

    	$p = new Product();
        $p->name = $request->name;	
        $p->category = $request->category;
        $p->brand = $request->brand;
        $p->desc = $request->desc;
        $p->price = $request->price;
        

        // php artisan storage:link   {Image link command to storage}
            // outside  storage/public -> andar new folder banana h jese products(for image)
            //config/filesytem.php -> local rewrite as public (local, public)

        $url="http://127.0.0.1:8000/storage/";
          $file=$request->file('image');
         $extension=$file->getClientOriginalExtension();
          // dd($extension);
          // exit;
          $path=$request->file('image')->storeAs('products', $p->id.'.'.$extension);
           // dd($extension);
           // exit;    
          $p->image=$path;
          $p->imgpath=$url.$path;
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

    public function allData(Request $req)
    {
        header("Access-Control-Allow-Origin: *");
         $user=product::get();
        
        if($user->count()){
            return response()->json($data = [
            'status' => 200,
            'msg'=>'Success',
            'product' => $user
            ]);
        }
        else{
            return response()->json($data = [
            'status' => 201,
            'msg' => 'Data Not Found'
            ]);
        }
    }
}
