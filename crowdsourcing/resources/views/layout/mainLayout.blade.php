<!DOCTYPE html>
<html>
<head>
	<title>Buyer|Portal</title>
</head>
<body>

	<h2>Welcome Dashboard</h2>	
    <h4>Name:{{ $user->full_name }}</h4>

	<a href="/dashboard">Dashboard</a>  |
	<!--  -->
    <a href="/profile">Profile</a> |
	<a href="/hire">Hire</a> |
	<a href="#contact">Contact</a>  |
	<a href="">Post</a>  |
	<a href="">History</a>  |
	<a href="/logout">Log Out</a> 
	
	@yield('content')

</body>
</html>