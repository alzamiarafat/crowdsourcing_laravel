<!DOCTYPE html>
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Buyer|Portal</title>
</head>
<body>
	@csrf

	<h2>Welcome Dashboard</h2>	
    <!--  -->

	<a href="{{route('dashboard',csrf_token())}}">Dashboard</a>  |
    <a href="{{route('profile',csrf_token())}}">Profile</a> |		
	<a href="">Post</a>  |
	<a href="">Hire</a> |
	<a href="">History</a>  |
	<a href="#contact">Contact</a>  |
	<a href="{{route('logout',csrf_token())}}">Log Out</a> 
	
	@yield('content')

</body>
</html>