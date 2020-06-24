<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Profile;
use Image;

class ProfileController extends Controller
{
    public function profile(){
        
    	return view('admin.profile.add_profile');
    }

    public function addprofile(Request $request ){
    	if($request->isMethod('post')){
    		$data  = $request->all();
    		

             $file = $request->file('image');
              // dd($file);
              // exit;

             $filename = 'image'.time().'.'.$request->image->extension();
             // dd($file);
             // exit;

             $destination=storage_path('../public/upload/profile');
             $file->move($destination,$filename);
             $path="/".$filename;
             $profile = new Profile;
    		 $profile->title = $data['title'];
    		 $profile->content = $data['content'];
    		 $profile->link = $data['link'];
             $profile->image = $path;

    		

    	     $profile->save();
    		 return redirect('/admin/view_profile')->with('flash_message_success', 'Profile has been added sucessfully');
    	}
             return view('admin.profile.add_profile');

    }


    public function viewprofile(Request $request){
       $profile = Profile::get();
      
        return view('admin.profile.viewprofile', compact('profile'));
    }


     public function editprofile(Request $request, $id)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            //upload image
            if($request->hasFile('image')){
                $image_tmp = Input::file('image');
                if($image_tmp->isValid()){
                    //upload image and resize it
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111, 99999). '.'.$extension;
                    $path = '../public/upload/profile/' .$filename;
                    Image::make($image_tmp)->save($path);
                }
            }elseif(!empty($data['current_image'])){
                $filename = $data['current_image'];
            }else{
               
                $filename = '';
            }


          Profile::where(['id' =>$id])->update([
                'title'=>$data['title'],
                'content' =>$data['content'],
                'link' => $data['link'],
                'image' =>$path]);
             return redirect('/admin/view_profile')->with('flash_message_success', 'Profile Updated');
        }

        $profiledetails = Profile::where(['id'=> $id])->get()->first();
        return view('admin.profile.edit_profile', compact('profiledetails'));

    }


    public function deletes( $id= null){
        
        $obj = Profile::find($id)->delete();
        return redirect()->back()->with('flash_message_error', 'Record deleted sucessfully');
       
    }
    
}
    

          
