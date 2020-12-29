@extends('layout.adminLayout')

@section('content')
<div style="height: 50px"></div>
    
    <div class="container" style="background-color: #EEEEEE; padding: 50px 50px">
        <div class="row">
            {{-- First column --}}
            <div class="col-7">
                <div class="content-center" style="margin-left: 60px;" >
                    <form method="POST">
                          @csrf  
                        <h3 style="margin-left: 80px">Edit Profile</h3>
                        <br>
                        
                            <div style="padding: 10px">
                                <span style="padding-right: 50px">Full Name</span>
                                <span style="padding-left: 5px">
                                    <input type="text" name="full_name" placeholder="Full {{ $data->full_name }}" value="{{ $data->full_name }}"/>
                                </span>
                            </div>
                                @error('full_name')	
                                    <span style="color: red">*{{ $message }}</span><br><br>
                                @enderror
                            
                                <div style="padding: 10px">
                                    <span style="padding-right: 50px">Username</span>
                                    <span style="padding-left: 5px">
                                        <input type="text" name="username" placeholder="{{ $data->username }}" value="{{ $data->username }}"/>
                                    </span>
                                </div>
                                @error('username')	
                                    <span style="color: red">*{{ $message }}</span><br><br>
                                @enderror
                        
                                
                            
                                <div style="padding: 10px; margin-left: 10px">
                                    <span style="padding-right: 73px">Email</span>
                                    <span style="padding-left: 5px">
                                        <input type="email" name="email" placeholder="{{ $data->email }}" value="{{ $data->email }}"/>
                                    </span>
                                </div>
                                @error('email')	
                                    <span style="color: red; margin-left: 17%">*{{ $message }}</span><br><br>
                                @enderror
                                
                            
                                <div style="padding: 10px; margin-left: 5px">
                                    <span style="padding-right: 62px">Contact</span>
                                    <span style="padding-left: 5px">
                                        <input type="text" name="contact" placeholder="{{ $data->contact }}"  value="{{ $data->contact }}">
                                    </span>
                                </div>
                                
                                @error('contact')	
                                    <span style="color: red; margin-left: 17%">*{{ $message }}</span><br><br>
                                @enderror
                            
                                <div style="padding: 10px; margin-left: 5px">
                                    <span style="padding-right: 61px">Address</span>
                                    <span style="padding-left: 5px">
                                        <input type="text" name="address" placeholder="{{ $data->address }}" value="{{ $data->address }}"/>
                                    </span>
                                </div>
                                @error('address')	
                                    <span style="color: red; margin-left: 17%">*{{ $message }}</span><br><br>
                                @enderror
                            
                                <div style="padding: 10px; margin-left: 3px">
                                    <span style="padding-right: 45px">Register as</span>
                                    <span style="padding-left: 5px">
                                        <input type="text" name="user_roll" placeholder="{{ $data->user_roll }}" value="{{ $data->user_roll }}" readonly>
                                    </span>
                                </div>
                                @error('user_roll')	
                                    <span style="color: red; margin-left: 17%">*{{ $message }}</span><br><br>
                                @enderror
                                <br>
                                <div style="padding-left: 30%;">
                                   <a href="{{ route('profileView', $data->id) }}" type="button" class="btn btn-secondary" style="margin-right: 10px">Cancel</a>

                                    <input class="btn btn-secondary" type="submit" name="submit" style="margin-left: 10px" value="Save">
                                </div>
                                
                                <br><br>
                
                    </form>
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