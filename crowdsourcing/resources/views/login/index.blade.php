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
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Submit"></td>
			</tr>
		</table>
		<a href="/reset">Forgot Password?</a>
		</fieldset>
	</form>

</body>
</html>