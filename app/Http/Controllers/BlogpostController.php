<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Blogpost;
use App\Profile;
use Image;

class BlogpostController extends Controller
{
    public function blogpost($id=null)
    {
    	$views = Blogpost::find($id);
    	$profile = Profile::all();
    	return view('blog.blogpost', compact('views', 'profile'));
    }

   

    public function add_blogpost(Request $request)
    {

         if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>" ;
            // print_r($data); die;

            $blog = new Blogpost;
            $blog->title = $data['title'];
            $blog->content = $data['content'];
           
            if($request->hasFile('image')){
                
                $file = $request->file('image');
              // dd($file);
              // exit;

             $filename = 'image'.time().'.'.$request->image->extension();
             // dd($file);
             // exit;

             $destination=storage_path('../public/upload/blogpost');
             $file->move($destination,$filename);
             $path="/".$filename;

             $blog->image = $path;
            }
             // dd($blog);
             //  exit;
             if($request->hasFile('images')){
                
                $file = $request->file('images');
              // dd($file);
              // exit;

             $filename = 'images'.time().'.'.$request->images->extension();
             // dd($file);
             // exit;

             $destination=storage_path('../public/upload/blogpost');
             $file->move($destination,$filename);
             $img_path="/".$filename;

             $blog->images = $img_path;
            }

            $blog->save();
            return redirect('/admin/view_blogpost')->with('flash_message_success', 'Blog Post has been added successfully!!');
        }
    	return view('admin.blogpost.add_blogpost');
    }

    public function view_blogpost(){
        $data = Blogpost::get();
        return view('admin.blogpost.view_blogpost', compact('data'));
    }


   public function edit_blogpost(Request $request, $id)
   {
    if($request->isMethod('post')){
            $data = $request->all();

            //upload ISt image
            if($request->hasFile('image')){
                $image_tmp = Input::file('image');
                if($image_tmp->isValid()){
                    //upload image and resize it
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = 'image'.time().'.'.$request->images->extension();
                    $path = 'upload/blogpost/' .$filename;
                    Image::make($image_tmp)->save($path);
                }
            }elseif(!empty($data['old_picture'])){
                $filename = $data['old_picture'];
            }else{
               
                $filename = '';
            }
          
            

            //upload 2nd image
            if($request->hasFile('images')){
                $images_tmp = Input::file('images');
                if($images_tmp->isValid()){
                    //upload image and resize it
                    $extension = $images_tmp->getClientOriginalExtension();
                    $filename = 'images'.time().'.'.$request->images->extension();
                    $img_path = 'upload/blogpost/' .$filename;
                    Image::make($images_tmp)->save($img_path);
                }
            }elseif(!empty($data['current_images'])){
                $filename = $data['current_images'];
            }else{
               
                $filename = '';
            }
          

        Blogpost::where(['id' =>$id])->update([
                'title'=>$data['title'],
                'image' =>$path,
                'content' =>$data['content'],
                'images' =>$img_path]);
             return redirect('/admin/view_blogpost')->with('flash_message_success', 'Blogpost has been Updated');
        }

        $edit = Blogpost::where(['id'=> $id])->get()->first();
        return view('admin.blogpost.edit_blogpost', compact('edit'));

    }

    public function delete( $id = null)
    {
        Blogpost::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_error', 'Record has been removed successfully!!');
    }
   
}
