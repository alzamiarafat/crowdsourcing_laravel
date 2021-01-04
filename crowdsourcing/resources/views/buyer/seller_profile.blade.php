@extends('layout/mainLayout')


@section('content')
@csrf

    
    <div class="container" style="background-color: #EEEEEE; padding: 50px 50px">
        <div class="row">
            {{-- First column --}}
            <div class="col-7">
                <div style="margin-left: 60px">
                    <h3 style="color: orange"> {{ucfirst($seller_in_userTable->user_roll)}} </h3>
                    <br>
                    
                    <span>Username:<h5> {{$seller_in_userTable->username}}</h5></span>
                    
                    <span>Contact No:<h5> {{$seller_in_userTable->contact}}</h5></span>
                    <span>Email:<h5> {{$seller_in_userTable->email}}</h5></span>
                    <span>Category:<h5> {{$seller->category_name}}</h5></span>
                    <span>Project Title:<h5> {{$seller->project_title}}</h5></span>
                    <span>Project Description:<h5> {{$seller->project_body}}</h5></span>   
          
                </div>

            </div>
            {{-- Second column --}}
            <div class="col-5">
                <h1>{{$seller_in_userTable->full_name}}</h1>
                
                    <div style="margin-top: 30px">

                        <img id="previewImg" src="{{asset('uploads/')}}/{{$seller_in_userTable->profile_image}}" width="200" height="200"><br><br>
                       
                    </div>
                
            </div>
        </div>
    </div>
	
@endsection