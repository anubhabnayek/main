@extends
<style>
	/* .main{
       height: 300px;	
	   width:300px%;
	   flex-wrap: wrap;
	   background-color: red;
	} */
</style>
<div class="container d-flex justify-content-center">
@foreach($data as $d)
    <div class="card p-3 py-4">
        <div class="main"> 
		<img src="{{url('website/upload/'.$d->file)}}"  width="100" class="rounded-circle">
            <h3 class="mt-2">{{$d->name}}</h3>
			<span class="mt-1 clearfix">{{$d->description}}</span>
			
            </div>
			@endforeach
			
			<hr class="line">
			
			<small class="mt-4">I am an web developer working at google Inc at california,USA</small>
              <div class="social-buttons mt-5"> 
			   <button class="neo-button"><i class="fa fa-facebook fa-1x"></i> </button> 
			   <button class="neo-button"><i class="fa fa-linkedin fa-1x"></i></button> 
			   <button class="neo-button"><i class="fa fa-google fa-1x"></i> </button> 
			   <button class="neo-button"><i class="fa fa-youtube fa-1x"></i> </button>
			   <button class="neo-button"><i class="fa fa-twitter fa-1x"></i> </button>
			  </div>
			  
			 <div class="profile mt-5">
			 
			 <button class="profile_button px-5">View profile</button>

		</div>
			   
        </div>
    </div>
</div>


