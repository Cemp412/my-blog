@extends('blog.layouts.master')
@section('content')    
    <div class="main-wrapper">
	    <section class="cta-section theme-bg-light py-5">
	    	@foreach($obj as $objs)
		    <div class="container text-center">
			    <h2 class="heading">{{$objs->title}} - A Blog Template Made For Developers</h2>
			    <div class="intro">Welcome to my blog. Subscribe and get my latest blog post in your inbox.</div>
			    <form class="signup-form form-inline justify-content-center pt-3">
                    <div class="form-group">
                        <label class="sr-only" for="semail">Your email</label>
                        <input type="email" id="semail" name="semail1" class="form-control mr-md-1 semail" placeholder="Enter email">
                    </div>
                    <button type="submit" class="btn btn-primary">Subscribe</button>
                </form>
		    </div><!--//container-->
		    @endforeach
	    </section>
	    <section class="blog-list px-3 py-5 p-md-5">
		    <div class="container">
			    <div class="item mb-5">
			    	@foreach($post as $posts)
				    <div class="media">
					    <img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="{{asset('/upload/blogpost'.$posts->image)}}" alt="image">
					    <div class="media-body">
						    <h3 class="title mb-1"><a href="blog-post.html">{{$posts->title}}</a></h3>
						    <div class="meta mb-1"><span class="date">Published 2 days ago</span><span class="time">5 min read</span><span class="comment"><a href="#">8 comments</a></span></div>
						    <div class="intro">{{$posts->content}}</div>
						    <a class="more-link" href="blog-post.html">Read more &rarr;</a>
					    </div><!--//media-body-->
					    @endforeach
				    </div><!--//media-->
			    </div><!--//item-->
			    
			   
			    
			    <nav class="blog-nav nav nav-justified my-5">
				  <a class="nav-link-prev nav-item nav-link d-none rounded-left" href="#">Previous<i class="arrow-prev fas fa-long-arrow-alt-left"></i></a>
				  <a class="nav-link-next nav-item nav-link rounded" href="blog-list.html">Next<i class="arrow-next fas fa-long-arrow-alt-right"></i></a>
				</nav>
				
		    </div>
	    </section>
@endsection
	   
    
    
    
    
   