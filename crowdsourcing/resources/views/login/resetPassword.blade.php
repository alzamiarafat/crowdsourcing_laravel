@extends('layout.commonlayout')

@section('content')
<div class="jumbotron vartical-center content-center">
	<div class="container">
		<div class="row-md-6">
			<div class="content-center">
				<form method="post">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<fieldset>
						<legend style="margin-left: 70px">Reset Password</legend>
						
						<table>
						<tr>
							<td>Email</td>
							<td><input type="email" name="email"></td>
							
						</tr>
						<tr>
							<td>Password</td>
							<td><input type="password" name="password"></td>
						</tr>
						<tr>
							<td></td>
							<td>
								@error('password')	
									<span style="color: red; margin-left: 17%">*{{ $message }}</span><br><br>
								@enderror
							</td>
						</tr>
						<tr>
							<td>Retype Password</td>
							<td><input type="password" name="repassword"></td>
						</tr>
						<tr>
							<td></td>
							<td>
								@error('repassword')	
									<span style="color: red; margin-left: 17%">*{{ $message }}</span><br><br>
								@enderror
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								@if(Session::has('msg'))
									<span style="color: red">{{ session('msg') }}</span>
								@endif
							</td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="submit" value="Submit"></td>
						</tr>
					</table>
					</fieldset>
				</form>	
			</div>
		</div>
	</div>
</div>



	<div class="container">
		<div style="text-align: center">
					</div>
	</div>
@endsection