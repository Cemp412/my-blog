<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\About;
use App\Profile;
use Image;

class AboutController extends Controller
{

    public function about(){
        $obj = Profile::all();
        $get = About::get();

        return view('blog.about', compact('get', 'obj'));
    }
    public function add_about(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->all();

            $about = new About;
            $about->aboutme = $data['aboutme'];
            $about->aboutblog = $data['aboutblog'];
            $about->skillexperience = $data['skillexperience'];
            $about->sideprojects = $data['sideprojects'];

    		//upload ISt image
    		if($request->hasFile('image')){
                $file = $request->file('image');
                $filename = 'image'.rand(111,99999).'.'.$request->image->extension();
                $src = '../public/upload/about/image';
                $file->move($src,$filename);
                $path = '/'.$filename;
                $about->image = $path;
                // dd($path);
                // die;
    		}

           //upload 2nd image
    		if($request->hasFile('projectimg')){
    			$file = $request->file('projectimg');
    			$filname = 'projectimg'.rand(111,99999).'.'.$request->projectimg->extension();
    			$pat = '../public/upload/about/projectimg';
    			$file->move($pat,$filname);
    			$imgpath = '/'.$filname;
                $about->projectimg = $imgpath;
    		    // dd($imgpath);
                // die;
    		}
    
            // print_r($about);
            // die;

            $about->save();


        return redirect('/admin/view_about')->with('flash_message_success', 'About blog has been added successfully!!');
    	}
        return view('admin.about.add');
    }


    public function view_about(){
        $data = About::get();
        return view('admin.about.view', compact('data'));
    }


    public function edit_about(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();

            //upload ISt image
            if($request->hasFile('image')){
                $file = $request->file('image');
                $filename = 'image'.rand(111,99999).'.'.$request->image->extension();
                $src = '../public/upload/about/image';
                $file->move($src,$filename);
                $path = '/'.$filename;
                
                // dd($path);
                // die;
            }else{
               
                $filename = $data['current_image'];
            }
            

             //upload 2nd image
            if($request->hasFile('projectimg')){
                $file = $request->file('projectimg');
                $filname = 'projectimg'.rand(111,99999).'.'.$request->projectimg->extension();
                $pat = '../public/upload/about/projectimg';
                $file->move($pat,$filname);
                $imgpath = '/'.$filname;
                
                // dd($imgpath);
                // die;
            }else{
               
                $filename = $data['current_projectimg'];
            }


            About::where(['id'=>$id])->update([
                'aboutme'=>$data['aboutme'],
                'aboutblog'=>$data['aboutblog'],
                'skillexperience'=>$data['skillexperience'],
                'sideprojects'=>$data['sideprojects'],
                'image'=>$path,
                'projectimg'=>$imgpath]);

              return redirect('/admin/view_about')->with('flash_message_success', 'About Me blog has been updated!!');

        }
        $AboutDetails = About::where(['id'=>$id])->get()->first();
        return view('admin.about.edit', compact('AboutDetails'));
    }

    public function delete($id = null){
        $data = About::find($id)->delete();
        return redirect()->back()->with('flash_message_error', 'Record deleted successfully');
    }
}
