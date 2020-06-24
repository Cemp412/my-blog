@extends('blog.layouts.master')
@section('content')
 
	 
        
	   
    
    <div class="main-wrapper">
	    	    
	    <article class="about-section py-5">
		    <div class="container">
			    <h2 class="title mb-3">About Me</h2>
			    @foreach($get as $gets)
			    <p>{{$gets->aboutme}} </p>
			    <figure><img class="img-fluid" src="{{asset('/upload/about/image/' .$gets->image)}}" alt="image"></figure>
			    <h5 class="mt-5">About The Blog</h5>
			    <p>{{$gets->aboutblog}}></p>
			    <h5 class="mt-5">My Skills and Experiences</h5>
			    <p>{{$gets->skillexperience}}</p>
			    <h5 class="mt-5">Side Projects</h5>
			    <p>{{$gets->sideprojects}}</p>
			    
			    <figure><a href="https://made4dev.com"><img class="img-fluid" src="{{asset('/upload/about/projectimg' .$gets->projectimg)}}" alt="project_image"></a></figure>
			    @endforeach
		    </div>
	    </article><!--//about-section-->
	    
	    <section class="cta-section theme-bg-light py-5">
		    <div class="container text-center">
			    <h2 class="heading">Newsletter</h2>
			    <div class="intro">Welcome to my blog. Subscribe and get my latest blog post in your inbox.</div>
			    <form class="signup-form form-inline justify-content-center pt-3">
                    <div class="form-group">
                        <label class="sr-only" for="semail">Your email</label>
                        <input type="email" id="semail" name="semail1" class="form-control mr-md-1 semail" placeholder="Enter email">
                    </div>
                    <button type="submit" class="btn btn-primary">Subscribe</button>
                </form>
		    </div><!--//container-->
	    </section>
	    
	    <footer class="footer text-center py-2 theme-bg-dark">
		   
	        <!--/* This template is released under the Creative Commons Attribution 3.0 License. Please keep the attribution link below when using for your own project. Thank you for your support. :) If you'd like to use the template without the attribution, you can buy the commercial license via our website: themes.3rdwavemedia.com */-->
            <small class="copyright">Designed with <i class="fas fa-heart" style="color: #fb866a;"></i> by <a href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>
		   
	    </footer>
    
    </div><!--//main-wrapper-->
    

    

@endsection