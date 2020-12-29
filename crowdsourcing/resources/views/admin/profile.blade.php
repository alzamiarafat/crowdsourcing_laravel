@extends('layout.adminLayout')

@section('content')
<div style="height: 50px"></div>
    
    <div class="container" style="background-color: #EEEEEE; padding: 50px 50px">
        <div class="row">
            {{-- First column --}}
            <div class="col-7">
                User Type:
                <h5 style="color: orange"> {{ Str::ucfirst($data->user_roll) }}</h5>
                <span>User name:<h5> {{ $data->username }}</h5></span>
                <span>Email:<h5> {{ $data->email }}</h5></span>
                @if ($data->user_roll == 'admin')
                    <span>Password: <h5>{{ $data->password }}</h5></span>
                @endif
                <span>Contact No:<h5> {{ $data->contact }}</h5></span>
                <span>Address:<h5> {{ $data->address }}</h5></span>

                <div style="padding-top: 30px">
                    <a href="{{ route('admin.editProfile', Session::get('user')->id) }}" type="button" class="btn btn-secondary">Edit Profile</a>
                </div>

            </div>
            {{-- Second column --}}
            <div class="col-5">
                <h1>{{ $data->full_name }}</h1>

                <form method="POST" action="{{ route('profileView', $data->id)}}" enctype="multipart/form-data">
                    @csrf                    
                    <div style="margin-top: 30px">

                        <img id="previewImg" src="{{asset('uploads/')}}/{{$data->profile_image}}" width="200" height="200"><br><br>
                        @if ($data->user_roll == 'admin')
                            <input type="file" style="border: 1px solid lightgray;border-radius: 5px;" name="profile_photo" accept="image/*" onchange="document.getElementById('previewImg').src = window.URL.createObjectURL(this.files[0])">
                            <br><br>
                            
                            <button type="submit" class="btn btn-outline-success btn-sm">Upload</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>

    

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