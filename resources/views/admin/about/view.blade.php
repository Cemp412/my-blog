@extends('admin.layouts.master')
@section('title', 'AboutMe Post')
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
                                 <h4>View AboutMe Post</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist"> 
                                 <a class="btn btn-add" href="{{url('/admin/add_about')}}"> <i class="fa fa-plus"></i> Add AboutMe Post
                                 </a>  
                              </div>
                             
                           </div>
                           <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="#table_id" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>About Me</th>
                                       <th>Post Image</th>
                                       <th>About Blog</th>
                                       <th>My Skills and Experience</th>
                                       <th>Sideprojects</th>
                                       <th>Project Images</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 @foreach($data as $pro)
                                 <tbody>
                                  
                                    <tr>
                                       <td>{{$pro->aboutme}}</td>
                                       
                                       <td>@php if(!empty($pro->image))
                                           {
                                          @endphp

                                          <img src="{{asset('/upload/about/image/' .$pro->image)}}" style="height: 150px; width: 150px; border-radius: 100%;">
                                           @php }else { @endphp
                                              <p>No  image found</p>
                                             @php } @endphp
                                       </td>
                                       <td>{{$pro->aboutblog}}</td>
                                       <td>{{$pro->skillexperience}}</td>
                                       <td>{{$pro->sideprojects}}</td>
                                       <td>@php if(!empty($pro->projectimg))
                                           {
                                          @endphp

                                          <img src="{{asset('/upload/about/projectimg/' .$pro->projectimg)}}" style="height: 150px; width: 150px; border-radius: 100%;">
                                           @php }else { @endphp
                                              <p>No  image found</p>
                                             @php } @endphp
                                       </td>
                                       
                                      
                                       
                                       <td>
                                         <a href="{{url('/admin/edit_about/'.$pro->id)}}" class="btn btn-add btn-sm"><i class="fa fa-pencil"></i></a>

                                         <a href="{{url('/admin/delete_about/' .$pro->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
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