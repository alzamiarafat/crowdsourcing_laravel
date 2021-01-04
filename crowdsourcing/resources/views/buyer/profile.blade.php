@extends('layout/mainLayout')


@section('content')
@csrf
<div class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
                <div style="margin-left: 60px">
                    <h3 style="color: orange"> {{ ucfirst($profile->user_roll) }}</h3>
                    <br>
                    <span>User name:<h5> {{ $profile->username }}</h5></span>
                    <span>Email:<h5> {{ $profile->email }}</h5></span>
                    <span>Contact No:<h5> {{ $profile->contact }}</h5></span>
                    <span>Address:<h5> {{ $profile->address }}</h5></span>
                    

                
                       

                            <a href="{{route('edit_profile', $profile['id'])}}" type="button" class="btn btn-secondary">Edit Profile</a>
    
                    
                    <br><br>
                </div>

            </div>

			<div class="col-5">
                <h1>{{ $profile->full_name }}</h1>

               <form method="POST" action="{{route('profile', $profile['id'])}}" enctype="multipart/form-data">
                    @csrf                    
                    <div style="margin-top: 30px">

                        <img id="previewImg" src="{{asset('uploads/')}}/{{$profile->profile_image}}" width="200" height="200"><br><br>
				<input type="file" style="border: 1px solid lightgray;border-radius: 5px;" name="profile_photo" accept="image/*" 		onchange="document.getElementById('previewImg').src = window.URL.createObjectURL(this.files[0])">
				<br><br>
				
				<button type="submit" class="btn btn-success btn-sm" style="width: 40%;height: 40px; font-size: 18px">Upload</button>
                        
                    </div>
                </form>
            </div>
				</div><div style="height: 150px"></div>
		

	
	@if(Session::has('pic_upload'))

		<script>
			swal("Uploaded!", "Profile Picture is updated", "success");
		</script>

	@elseif(Session::has('edit_profile'))
		<script>
			swal("Success!", "Your Profile is updated", "success");
		</script>
		
	@elseif(Session::has('err'))
		<script>
			swal("Error!", "Please select one!", "error");
		</script>
	@endif
@endsection