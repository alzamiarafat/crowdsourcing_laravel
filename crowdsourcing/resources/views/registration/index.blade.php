<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
</head>
<body>
	<form method="POST">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<fieldset>
			<legend>Registration</legend>
			
			<table>
			<tr>
				<td>Full Name</td>
				<td><input type="text" name="full_name" required/></td>
			</tr>
			<tr>
				<td>Username</td>
				<td><input type="text" name="username" required/></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password" required/></td>
			</tr>
			<tr>
				<td>Retype Password</td>
				<td><input type="password" name="repassword" required/></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="email" name="email"/></td>
			</tr>
			<tr>
				<td>Contacts</td>
				<td><input type="text" name="contact"/></td>
			</tr>
			<tr>
				<td>Address</td>
				<td><input type="text" name="address"/></td>
			</tr>
			<tr>

				<td>Register as</td>

				<td> <input type="text" name="user_roll" placeholder="Buyer/Seller" required></td>

			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Submit"></td>
			</tr>
		</table>
		<p class="message">Already registered? <a href="/login">Sign In</a></p>
		
		</fieldset>
	</form>

</body>
</html>