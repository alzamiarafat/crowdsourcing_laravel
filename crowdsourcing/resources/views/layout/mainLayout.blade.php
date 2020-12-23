<!DOCTYPE html>
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" 
	integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous">
</script>