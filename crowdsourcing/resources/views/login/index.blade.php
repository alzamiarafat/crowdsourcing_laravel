<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<form method="POST" action="">
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
			<tr><td></td>
				<td><span style="color: red">{{session('msg')}}</span> 
			
		</td></tr>
				<td></td>
				<td><a href="{{route('dashboard',csrf_token())}}"><button name="submit" value="Submit" >Submit</button></a></td>
			</tr>
		</table>
		<a href="/reset">Forgot Password?</a>
		</fieldset>
	</form>
</body>
</html>