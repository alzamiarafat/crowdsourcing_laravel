<!DOCTYPE html>
<html>
<head>
	<title>Reset Password</title>
</head>
<body>
	<form method="post">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<fieldset>
			<legend>Reset Password</legend>
			
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
				<td>Retype Password</td>
				<td><input type="password" name="repassword"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Submit"></td>
			</tr>
		</table>
		</fieldset>
	</form>

</body>
</html>