@extends('layout.adminLayout')

@section('content')
<div style="height: 50px"></div>
    
<div class="container" style="background-color: #EEEEEE; padding: 50px 50px">
    <div class="d-flex justify-content-center">
        <form method="POST">
            <h1>Admin Form</h1>
						
            <br><br><br>
            
            <input type="hidden" name="_token" value="{{csrf_token()}}">

                <div style="padding: 10px">
                    <span style="padding-right: 50px">Full Name</span>
                    <span style="padding-left: 5px">
                        <input type="text" name="full_name" placeholder="Full Name" value="{{ old('full_name') }}" required/>
                    </span>
                </div>
                    @error('full_name')	
                        <span style="color: red">*{{ $message }}</span><br><br>
                    @enderror
                
                    <div style="padding: 10px">
                        <span style="padding-right: 50px">Username</span>
                        <span style="padding-left: 5px">
                            <input type="text" name="username" placeholder="Username" value="{{ old('username') }}" required/>
                        </span>
                    </div>
                    @error('username')	
                        <span style="color: red">*{{ $message }}</span><br><br>
                    @enderror
            
                    <div style="padding: 10px">
                        <span style="padding-right: 50px"> Password</span> 
                        <span style="padding-left: 10px">
                            <input type="password" name="password" placeholder="Password" value="{{ old('password') }}" required/>
                        </span>
                    </div>
                    
                    @error('password')	
                        <span style="color: red">*{{ $message }}</span><br><br>
                    @enderror
            
                    <div style="padding: 10px">
                        <span>Retype Password</span> 
                        <span style="padding-left: 8px">
                            <input type="password" name="repassword" placeholder="Retype-password" value="{{ old('repassword') }}" required/>
                        </span>
                    </div>
                    
                    @error('repassword')	
                        <span style="color: red">*{{ $message }}</span><br><br>
                    @enderror
                
                    <div style="padding: 10px">
                        <span style="padding-right: 73px">Email</span>
                        <span style="padding-left: 15px">
                            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required/>
                        </span>
                    </div>
                    @error('email')	
                        <span style="color: red">*{{ $message }}</span><br><br>
                    @enderror
                    
                
                    <div style="padding: 10px">
                        <span style="padding-right: 62px">Contact</span>
                        <span style="padding-left: 7px">
                            <input type="text" name="contact" placeholder="Contact" required value="{{ old('contact') }}"/>
                        </span>
                    </div>
                    
                    @error('contact')	
                        <span style="color: red">*{{ $message }}</span><br><br>
                    @enderror
                
                    <div style="padding: 10px">
                        <span style="padding-right: 61px">Address</span>
                        <span style="padding-left: 9px">
                            <input type="text" name="address" placeholder="Address" value="{{ old('address') }}" required/>
                        </span>
                    </div>
                    @error('address')	
                        <span style="color: red">*{{ $message }}</span><br><br>
                    @enderror
                
                    <div style="padding: 10px">
                        <span style="padding-right: 45px">Register as</span>
                        <span style="padding-left: 5px">
                            <input type="text" name="user_roll" placeholder="Admin" value="{{ old('user_roll') }}" required>
                        </span>
                    </div>
                    @error('user_roll')	
                        <span style="color: red">*{{ $message }}</span><br><br>
                    @enderror
                    <br>
                    <div style="padding-left: 35%">
                        <input class="btn btn-secondary" type="submit" name="submit" value="Add">
                    </div>
                    @if (Session::has('err'))
                        <br><br>
                        <div>
                            <span class="alert alert-danger">{{ session('err') }}</span>
                        </div>
                    @endif
                    <br><br>
    
        </form>
    </div>
</div>

@endsection