<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<form method="POST" action="">
		
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<fieldset>
			<legend>Login</legend>
			 @csrf
			<table>
			<tr>
				<td>Username</td>
				<td><input type="text" name="username" value="{{old('username')}}"></td>
			</tr>
			
			<td></td>
			<td>
				
				@error('username')
    				<span style="color: red; font-size: 14px;">*{{ $message }}</span>
				@enderror
			</td>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password" value="{{old('password')}}"></td>
			</tr>
			<td></td>
			<td>
				@error('password')
    				<span style="color: red; font-size: 14px;">*{{ $message }}</span>
				@enderror
			</td>
			<tr>
				<p style="color: red">
			{{session('msg')}}
		</p>
				<td></td>
				<td><input type="submit" name="submit" value="Submit"></td>
			</tr>
		</table>
		<a href="/reset">Forgot Password?</a>
		</fieldset>
	</form>
</body>
</html>