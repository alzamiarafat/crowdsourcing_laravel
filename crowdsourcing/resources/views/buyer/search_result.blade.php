@extends('layout/mainLayout')


@section('content')
@csrf

<div class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
                <div style="margin-left: 60px">
                	@foreach ($results as $users)
                    	<h3 style="color: orange"> {{ $users['user_roll'] }}</h3>
                    	<br>
                    	<span>User name:<h5> {{ $users['username'] }}</h5></span>
                    <span>Email:<h5> {{ $users['email'] }}</h5></span>
                    <span>Contact No:<h5> {{ $users['contact'] }}</h5></span>
                    <span>Address:<h5> {{ $users['address'] }}</h5></span>
                    
                    <br><br>
                </div>

            </div>

			<div class="col-5">
                <h1>{{ $users['full_name'] }}</h1>

               <img id="previewImg" src="{{asset('uploads/')}}/{{ $users['profile_image'] }}" width="200" height="200"><br><br>
                                   
                  
            </div>
				</div><div style="height: 150px"></div>


 @endforeach
	
   
@endsection