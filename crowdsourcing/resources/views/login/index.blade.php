@extends('layout.commonlayout')

@section('content')
	
<div class="jumbotron vartical-center content-center">
	<div class="container">
		<div class="row-md-6">
			<div class="content-center">
				<form method="POST" action="">
			
					<h1 class="logo">Login</h1>
					<br><br>
						@csrf
					
					
						Username
						<input type="text" name="username" value="{{old('username')}}">
					
						
						@error('username')
						<br>
							<span style="color: red; font-size: 14px;">*{{ $message }}</span>
						@enderror
						<br><br>
						Password
						<input type="password" name="password" value="{{old('password')}}">
					
						@error('password')
						<br>
							<span style="color: red; font-size: 14px;">*{{ $message }}</span>
						@enderror
						<br>
							<span style="color: red">{{session('msg')}}</span> 
							<br>
							<a href="{{route('dashboard',csrf_token())}}"><button name="submit" value="Submit" class="btn btn-secondary">Submit</button></a>
						<br><br>
						<a href="/reset">Forgot Password?</a>
		
				</form>
			</div>
		</div>
	</div>
</div>

@endsection
