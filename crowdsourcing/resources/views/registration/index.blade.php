@extends('layout.commonlayout')

@section('content')
<div class="jumbotron vartical-center content-center">
	<div class="container">
		<div class="row-md-6">
			<div class="content-center">
				<form method="POST">
					
				<h1>Registration</h1>
				<br><br><br>
				
					<table>
						<input type="hidden" name="_token" value="{{csrf_token()}}">

						<tr>
							
						<td>Full Name</td>  
						<td><input type="text" name="full_name" placeholder="Full Name" required/><br><br></td>
					
						</tr>
						<tr>
							<td>Username</td>  
							<td><input type="text" name="username" placeholder="Username" required/><br><br></td>
						</tr>
					
						<tr>
							<td>Password </td>
							<td><input type="password" name="password" placeholder="Password" required/><br><br></td>
						</tr>
						<tr>
							<td>Retype Password</td> 
							<td><input type="password" name="repassword" placeholder="Retype-password" required/><br><br></td>
						</tr>
					
						<tr>
							<td>Email</td> 
							<td><input type="email" name="email" placeholder="Email"/><br><br></td>
						</tr>
					
						<tr>
							<td>Contacts </td>
							<td><input type="text" name="contact" placeholder="Contact"/><br><br></td>
						</tr>
					
						<tr>
							<td>Address</td>
							<td><input type="text" name="address" placeholder="Address"/><br><br></td>
						</tr>
				
						<tr>
							<td>Register as</td> 
							<td><input type="text" name="user_roll" placeholder="Buyer/Seller" required><br><br></td>	
						</tr>
						
						<tr>
							<td></td>
							<td style="float: right"><input type="submit" name="submit" value="Submit"></td>
						</tr>
						
					</table>
					<br><br>
					<p class="message">Already registered? <a href="/login">Sign In</a></p>
				
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
	

