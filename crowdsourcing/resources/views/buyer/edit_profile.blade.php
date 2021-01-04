@extends('layout/mainLayout')


@section('content')
@csrf
	<div class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
                <div style="margin-left: 60px">
	
		<form method="POST" action="{{route('edit_profile', $user['id'])}}" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="{{csrf_token()}}">

            <fieldset>
			<legend>Edit Profile</legend>
			
			<table>
			<tr>
				<td>Full Name</td>
				<td><input type="text" name="full_name" value="{{$user->full_name}}" /></td>
			</tr>
			<tr>
				<td>Username</td>
				<td><input type="text" name="username" value="{{$user->username}}"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="email" name="email" value="{{$user->email}}"/></td>
			</tr>
			<tr>
				<td>Contacts</td>
				<td><input type="text" name="contact" value="{{$user->contact}}"/></td>
			</tr>
			<tr>
				<td>Address</td>
				<td><input type="text" name="address" value="{{$user->address}}"/></td>
			</tr>
			<tr>
				<td></td>
				
				<td><a href="{{route('edit_profile', $user['id'])}}{{csrf_token()}}"><button type="submit" class="btn btn-outline-success btn-sm">Submit</button></a></td>
			</tr>
		</table>
				
		</form>
		 <div style="padding: 150px 100px"></div>
	</div>
   
@endsection