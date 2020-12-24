<!DOCTYPE html>
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 						integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css" 					integrity="sha512-hwwdtOTYkQwW2sedIsbuP1h0mWeJe/hFOfsvNKpRB3CkRxq8EW7QMheec1Sgd8prYxGm1OM9OZcGW7/GUud5Fw==" 					crossorigin="anonymous" />
	<title>Buyer|Portal</title>
</head>
<body>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" 				crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js" 									integrity="sha512-MqEDqB7me8klOYxXXQlB4LaNf9V9S0+sG1i8LtPOYmHqICuEZ9ZLbyV3qIfADg2UJcLyCm4fawNiFvnYbcBJ1w==" 					crossorigin="anonymous"></script>
	@csrf

	<h2>Welcome Dashboard</h2>	
    <h4>Name: {{$user-> full_name}}</h4>

	<a href="{{route('dashboard',csrf_token())}}">Dashboard</a>  |
	<a href="{{route('profile', $user['id'])}}{{csrf_token()}}">Profile</a> |
	<li class="has-sub">
		<a class="js-arrow" href="#">
		   <i class="fas fa-cogs"></i> Operation</a>
		<ul class="list-unstyled navbar__sub-list js-sub-list">
			<li><a href="{{route('create_post',csrf_token())}}"><i class="fas fa-plus-circle"></i>Write Post </a></li>  
			
		</ul>
	</li>
	<li class="has-sub">
		<a class="js-arrow" href="#">
			<i class="fas fa-table"></i>Tables</a>
		<ul class="list-unstyled navbar__sub-list js-sub-list">
			<li>
			   <a href="/buyer/sellers"><i class="fas fa-users"></i>Sellers</a>
			   <li><a href="/buyer/post_list"><i class="fas fa-list-alt"></i>Posts</a></li>
			</li>
		</ul>
	</li>
	<a href="">History</a>  |
	<a href="#contact">Contact</a>  |
	<a href="{{route('logout',csrf_token())}}">Log Out</a> 
	
	@yield('content')


</body>
</html>