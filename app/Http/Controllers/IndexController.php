<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Blogpost;

class IndexController extends Controller
{
    public function index(){
      $obj =Profile::get();
      $post = Blogpost::all();

      

    	return view('blog.layouts.index', compact('obj', 'post'));
    }
}
