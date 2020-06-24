@extends('admin.layouts.master')
@section('title', 'Add Profile')
@section('content')
<!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-image"></i>
               </div>
               <div class="header-title">
                  <h1>Edit Profile</h1>
                  <small>Edit Profile</small>
               </div>
            </section>

            <div class="container">
                @if(Session::has('flash_message_error'))
                <div class="alert alert-sm alert-danger alert-block" role="alert">
                    <button type="button" class="close" data-dismiss="alert" area-label="close">
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
                              <a class="btn btn-add " href="{{url('/admin/view_profile')}}"> 
                              <i class="fa fa-eye"></i> View Profile </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" action="{{url('/admin/edit_profile/' .$profiledetails->id)}}" method="post" enctype="multipart/form-data">
                           	{{csrf_field()}}

                             
                              <div class="form-group">
                                 <label>Blogger's Name</label>
                                 <input type="text" class="form-control" placeholder="Enter Blogger Name" name="title" value="{{$profiledetails->title}}" id="title" required>
                              </div>
                            
                              <div class="form-group">
                                 <label>Content</label>
                                 <textarea type="text" class="form-control" placeholder="Enter Content" name="content"  id="content" required>{{$profiledetails->content}}</textarea>
                              </div>
                              <div class="form-group">
                                 <label>Link</label>
                                 <input type="text" name="link" id="link" value="{{$profiledetails->link}}"" class="form-control">
                              </div>
                              

                              <div class="form-group">
                                 <label>Profile  Picture</label>
                                 <input type="file" name="image">
                                 <input type="hidden" name="image" value="{{$profiledetails->image}}">
                                 @if(!empty($profiledetails->image))
                                 <img src="{{asset('/upload/profile/'  .$profiledetails->image)}}" alt="" style="width: 100px">

                              </div>
                              @endif
                              
                               
                              <div class="reset-button">
                              	<input type="submit" class="btn btn-success" value="Edit Profile" >
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