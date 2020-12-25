@extends('layout.commonlayout')

@section('content')
<div class="jumbotron vartical-center content-center">
	<div class="container">
		<div class="row-md-6">
			<div class="content-center">
				<form method="POST">
						
					<h1>Registration</h1>
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
								<span style="padding-left: 5px">
									<input type="password" name="password" placeholder="Password" value="{{ old('password') }}" required/>
								</span>
							</div>
							
							@error('password')	
								<span style="color: red; margin-left: 17%">*{{ $message }}</span><br><br>
							@enderror
					
							<div style="padding: 10px">
								<span>Retype Password</span> 
								<span style="padding-left: 5px">
									<input type="password" name="repassword" placeholder="Retype-password" value="{{ old('repassword') }}" required/>
								</span>
							</div>
							
							@error('repassword')	
								<span style="color: red; margin-left: 17%">*{{ $message }}</span><br><br>
							@enderror
						
							<div style="padding: 10px">
								<span style="padding-right: 73px">Email</span>
								<span style="padding-left: 5px">
									<input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required/>
								</span>
							</div>
							@error('email')	
								<span style="color: red; margin-left: 17%">*{{ $message }}</span><br><br>
							@enderror
							
						
							<div style="padding: 10px">
								<span style="padding-right: 62px">Contact</span>
								<span style="padding-left: 5px">
									<input type="text" name="contact" placeholder="Contact" required value="{{ old('contact') }}"/>
								</span>
							</div>
							
							@error('contact')	
								<span style="color: red; margin-left: 17%">*{{ $message }}</span><br><br>
							@enderror
						
							<div style="padding: 10px">
								<span style="padding-right: 61px">Address</span>
								<span style="padding-left: 5px">
									<input type="text" name="address" placeholder="Address" value="{{ old('address') }}" required/>
								</span>
							</div>
							@error('address')	
								<span style="color: red; margin-left: 17%">*{{ $message }}</span><br><br>
							@enderror
						
							<div style="padding: 10px">
								<span style="padding-right: 45px">Register as</span>
								<span style="padding-left: 5px">
									<input type="text" name="user_roll" placeholder="Buyer/Seller" value="{{ old('user_roll') }}" required>
								</span>
							</div>
							@error('user_roll')	
								<span style="color: red; margin-left: 17%">*{{ $message }}</span><br><br>
							@enderror
							<br>
							<div style="padding-left: 35%;">
								<input class="btn btn-secondary" type="submit" name="submit" value="Submit">
							</div>
							@if (Session::has('re-msg'))
								<br><br>
								<div>
									<span class="alert alert-danger" style="margin-left: 9%">{{ session('re-msg') }}</span>
								</div>
							@endif
							<br><br>
							<span class="message" style="margin-left: 9%">Already registered? <a href="/login">Sign In</a></span>
			
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
	

