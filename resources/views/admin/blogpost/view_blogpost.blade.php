@extends('admin.layouts.master')
@section('title', 'BlogPost')
@section('content')
<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="header-title">
                  <h1>View BlogPost</h1>
                  <!-- <small>Categories List</small> -->
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
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="#">
                                 <h4>View Blogpost</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist"> 
                                 <a class="btn btn-add" href="{{url('/admin/add_blogpost')}}"> <i class="fa fa-plus"></i> Add BlogPost
                                 </a>  
                              </div>
                             
                           </div>
                           <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="#table_id" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th> Id</th>
                                       <th>Title</th>
                                       <th>Image</th>
                                       <th>Content</th>
                                       <th>Images</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 @foreach($data as $pro)
                                 <tbody>
                                  
                                    <tr>
                                       <td>{{$pro->id}}</td>
                                       <td>{{$pro->title}}</td>
                                       <td>

                                          <img src="{{asset('/upload/blogpost/' .$pro->image)}}" style="height: 150px; width: 150px; border-radius: 100%;">
                                         
                                       </td>
                                       <td>{{$pro->content}}</td>
                                       <td>

                                          <img src="{{url('/upload/blogpost/' .$pro->images)}}" style="height: 150px; width: 150px; border-radius: 100%;">
                                          
                                       </td>
                                       
                                      
                                       
                                       <td>
                                         <a href="{{url('/admin/edit_blogpost/'.$pro->id)}}" class="btn btn-add btn-sm"><i class="fa fa-pencil"></i></a>

                                         <a href="{{url('/admin/delete_blogpost/' .$pro->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                                       </td>
                                       @endforeach
                                    </tr>
                                 
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
              
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
@endsection