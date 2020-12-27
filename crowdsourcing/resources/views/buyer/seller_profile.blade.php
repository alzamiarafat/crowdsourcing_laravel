@extends('layout/mainLayout')


@section('content')
@csrf
	<div >
		<fieldset >
		<legend>Seller Profile</legend>

		<table style="position: relative;left: 20px;">

			<tr >
				<td style="width: 40%; height: 40px;">Name</td>
				<td >{{$seller_in_userTable->full_name}}</td>
			</tr>
				
			<tr>
				<td style="width: 40%; height: 40px;">Username</td>
				<td>{{$seller_in_userTable->username}}</td>
			</tr>
			

			<tr>
				<td style="width: 40%; height: 40px;">Contact</td>
				<td>{{$seller_in_userTable->contact}}</td>
			</tr>

			<tr>
				<td style="width: 40%; height: 40px;">Email</td>
				<td>{{$seller_in_userTable->email}}</td>
			</tr>

			<tr>
				<td style="width: 40%; height: 40px;">Category</td>
				<td>{{$seller->category_name}}</td>
			</tr>

			<tr>
				<td style="width: 40%; height: 40px;">Project Title</td>
				<td>{{$seller->project_title}}</td>
			</tr>

			<tr>
				<td style="width: 40%; height: 40px;">Project Description</td>
				<td>{{$seller->project_body}}</td>
			</tr>

			<tr>
				<td></td>
			</tr>

		</table>

			
			<div style="position: absolute; left: 30%; top: 120px">

				<img id="previewImg" src="{{asset('uploads/')}}/{{$seller_in_userTable->profile_image}}" width="200" height="200"><br><br>
				
				
				
			</div>
				
		</form>
		
	</fieldset>
	</div>
	
	@if(Session::has('pic_upload'))

		<script>
			swal("Uploaded!", "Profile Picture is updated", "success");
		</script>

	@elseif(Session::has('edit_profile'))
		<script>
			swal("Success!", "Your Profile is updated", "success");
		</script>
		
	@elseif(Session::has('err'))
		<script>
			swal("Error!", "Please select one!", "error");
		</script>
	@endif
@endsection