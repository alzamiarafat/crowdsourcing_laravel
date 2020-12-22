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
	<button><a href="#contact">Contact</a></button>  |
	<button><a href="">Post</a></button>  |
	<button><a href="">History</a></button>  |
	<button><a href="/logout">Log Out</a></button>   
	
	@yield('content')

</body>
</html>