@extends('admin.layouts.master')
@section('title', 'Edit Blogpost')
@section('content')
<!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-image"></i>
               </div>
               <div class="header-title">
                  <h1>Edit Blogpost</h1>
                  <small>Edit Blogpost</small>
               </div>
            </section>

            <div class="container">
                @if(Session::has('flash_message_error'))
                <div class="alert alert-sm alert-danger alert-block" role="alert">
                    <button type="button" class="close" edit-dismiss="alert" area-label="close">
                        <span area-hidden="true">&times;</span>
                    </button>
                    <strong>{!! session('flash_message_error') !!}</strong>
                </div>
                @endif


                @if(Session::has('flash_message_success'))
                <div class="alert alert-sm alert-success alert-block" role="alert">
                    <button type="button" class="close" data-dismiss="alert" area-label="close">
                        <span area-hidden="true">&times;</span>
                    </button>
                    <strong>{!! session('flash_message_success') !!}</strong>
                </div>
                @endif
             
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add " href="{{url('/admin/view_blogpost')}}"> 
                              <i class="fa fa-eye"></i> View Post </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" action="{{url('/admin/edit_blogpost/'.$edit->id)}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}

                             
                              <div class="form-group">
                                 <label>Post Title</label>
                                 <input type="text" class="form-control" placeholder="Enter Post Title" name="title" value="{{$edit->title}}" id="title" required>
                              </div>

                              <div class="form-group">
                                 <label>Post Image</label>
                                 <input type="file" name="image">
                                 <input type="hidden" name="current_image" value="{{$edit->image}}">
                                 @if(!empty($edit->image))
                                 <img src="{{asset('/upload/blogpost/' .$edit->image)}}" style=" width:100px, margin-top:10px">
                              </div>
                              @endif
                              
                            
                              <div class="form-group">
                                 <label>Content</label>
                                 <textarea type="text" class="form-control" placeholder="Enter Content" name="content" id="content" required>{{$edit->content}}</textarea>
                              </div>
                              
                              <div class="form-group">
                                 <label>Images</label>
                                 <input type="file" name="images">
                                 <input type="hidden" name="current_images" value="{{$edit->images}}">
                                 @if(!empty($edit->images))
                                 <img src="{{asset('/upload/blogpost/' .$edit->images)}}" style=" width:100px, margin-top:10px">
                              </div>
                              @endif
                              
                              
                              <div class="reset-button">
                                <input type="submit" class="btn btn-success" value="edit Post" >
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
@endsection