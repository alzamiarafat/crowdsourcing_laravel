<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<style>
		.vertical-center {
			min-height: 100%;  /* Fallback for browsers do NOT support vh unit */
			min-height: 100vh; /* These two lines are counted as one :-)       */

			display: flex;
			align-items: center;
		}
		.content-center{
			width: 600px;
			height: 490px;
			margin-left: 30%;
			margin-top: 10%;
		}
		.logo{
			margin-left: 50px;
		}
	</style>
</head>
<body>
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
								<a href="{{route('dashboard',csrf_token())}}"><button name="submit" value="Submit" >Submit</button></a>
							<br><br>
							<a href="/reset">Forgot Password?</a>
			
					</form>
				</div>
			</div>
		</div>
	</div>


	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</body>
</html>