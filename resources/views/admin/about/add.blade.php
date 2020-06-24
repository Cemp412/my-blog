@extends('admin.layouts.master')
@section('title', 'Add About')
@section('content')
<!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-image"></i>
               </div>
               <div class="header-title">
                  <h1>Add About</h1>
                  <small>Add About</small>
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
                              <a class="btn btn-add " href="{{url('/admin/view_blogpost')}}"> 
                              <i class="fa fa-eye"></i> View About Post </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" action="{{url('/admin/add_about')}}" method="post" enctype="multipart/form-data">
                           	{{csrf_field()}}

                             
                              <div class="form-group">
                                 <label>About Me</label>
                                 <textarea type="text" class="form-control" placeholder="Enter Post Title" name="aboutme" id="aboutme" required></textarea>
                              </div>
                              

                               <div class="form-group">
                                 <label>Post Image</label>
                                 <input type="file" name="image">
                                 <input type="hidden" name="current_image">
                              </div>



                              <div class="form-group">
                                 <label>About Blog</label>
                                 <textarea type="text" class="form-control" placeholder="Enter About Yourself " name="aboutblog" id="aboutblog" required></textarea>

                              </div>

                              <div class="form-group">
                                 <label>My Skills and Experience</label>
                                 <textarea type="text" class="form-control" placeholder="Enter Content" name="skillexperience" id="skillexperience" required></textarea>
                              </div>

                              <div class="form-group">
                                 <label>Sideprojects</label>
                                 <textarea type="text" class="form-control" placeholder="Enter Content" name="sideprojects" id="sideprojects" required></textarea>
                              </div>
                              
                              <div class="form-group">
                                 <label>Project Images</label>
                                 <input type="file" name="projectimg">
                                 <input type="hidden" name="current_projectimg">
                              </div>
                              
                              
                              <div class="reset-button">
                              	<input type="submit" class="btn btn-success" value="Add Post" >
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