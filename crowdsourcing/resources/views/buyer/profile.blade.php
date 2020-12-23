@extends('layout/mainLayout')


@section('content')
	<div >
		<fieldset >
		<legend>Profile</legend>

		<table style="position: relative;left: 20px;">
			<tr>
				<td>ID</td>
				<td>{{$user->id}}</td>
			</tr>

			<tr >
				<td style="width: 40%; height: 40px;">Name</td>
				<td >{{$user->full_name}}</td>
			</tr>
				
			<tr>
				<td style="width: 40%; height: 40px;">Username</td>
				<td>{{$user->username}}</td>
			</tr>
			<tr>
				<td style="width: 40%; height: 40px;">Password</td>
				<td>{{$user->password}}</td>
			</tr>

			<tr>
				<td style="width: 40%; height: 40px;">Address</td>
				<td>{{$user->address}}</td>
			</tr>

			<tr>
				<td style="width: 40%; height: 40px;">Contact</td>
				<td>{{$user->contact}}</td>
			</tr>

			<tr>
				<td style="width: 40%; height: 40px;">Email</td>
				<td>{{$user->email}}</td>
			</tr>

			<tr>
				<td></td>
				<td><a href="edit_profile/<%=profile.username %>"><button type="button" class="btn btn-secondary">Edit Profile</button></a><br><br></td>
			</tr>

		</table>

		

		<form method="POST" enctype="multipart/form-data">
			<div style="position: absolute; left: 30%; top: 120px">

				<img id="previewImg" src="" width="200" height="200"><br><br>
				<input type="file" style="border: 1px solid lightgray;border-radius: 5px;" name="profile_photo" accept="image/*" 		onchange="document.getElementById('previewImg').src = window.URL.createObjectURL(this.files[0])">
				<br><br>
				
				<button>Upload</button>

			</div>
				
		</form>
		
	</fieldset>
	</div>

@endsection