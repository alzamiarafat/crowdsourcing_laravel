@extends('layout/mainLayout')


@section('content')
@csrf
	<div class="container" style="background-color: #EEEEEE; padding: 50px 50px">
		<div class="row">
<div class="col-7">
                <div style="margin-left: 60px">
                    <h3 style="color: orange"> {{ ucfirst($user->user_roll) }}</h3>
                    <br>
                    <span>User name:<h5> {{ $user->username }}</h5></span>
                    <span>Email:<h5> {{ $user->email }}</h5></span>
                    @if ($user->user_roll == 'admin')
                        <span>Password: <h5>{{ $user->password }}</h5></span>
                    @endif
                    <span>Contact No:<h5> {{ $user->contact }}</h5></span>
                    <span>Address:<h5> {{ $user->address }}</h5></span>
                    <span>Joined at:<h5> {{ $user->created_at }}</h5></span>

                    @if ($user->user_roll == 'admin')
                        <div style="padding-top: 30px">
                            <a href="{{ route('adminDashboard') }}" class="btn btn-primary">Back</a>

                            <a href="{{ route('admin.editProfile', Session::get('user')->id) }}" type="button" class="btn btn-secondary">Edit Profile</a>
                        </div>
                    @endif
                    <br><br>
                </div>

            </div>

			<div class="col-5">
                <h1>{{ $user->full_name }}</h1>

               <form method="POST" action="{{route('profile', $user['id'])}}" enctype="multipart/form-data">
                    @csrf                    
                    <div style="margin-top: 30px">

                        <img id="previewImg" src="{{asset('uploads/')}}/{{$user->profile_image}}" width="200" height="200"><br><br>
				<input type="file" style="border: 1px solid lightgray;border-radius: 5px;" name="profile_photo" accept="image/*" 		onchange="document.getElementById('previewImg').src = window.URL.createObjectURL(this.files[0])">
				<br><br>
				
				<button type="submit" class="btn btn-success btn-sm" style="width: 40%;height: 40px; font-size: 18px">Upload</button>
                        
                    </div>
                </form>
            </div>
				
		</form>
		

	
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