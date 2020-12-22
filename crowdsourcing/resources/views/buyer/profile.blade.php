@extends('layout/mainLayout')


@section('content')
	<div >
		<fieldset >
		<legend>Profile</legend>

		<table border="1">
			<tr>
				<td>Username</td>
				<td>Name</td>
				<td>Email</td>
				<td>Contact</td>
			</tr>

			<tr>
				<td>{{$user->username}}</td>
				<td>{{$user->full_name}}</td>
				<td>{{$user->email}}</td>
				<td>{{$user->contact}}</td>	
			</tr>	
		</table>	
	</fieldset>
	</div>
@endsection

@section('title')
Home Page
@endsection