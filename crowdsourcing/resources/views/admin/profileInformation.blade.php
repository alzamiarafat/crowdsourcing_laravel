<!DOCTYPE html>
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 						integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css" 					integrity="sha512-hwwdtOTYkQwW2sedIsbuP1h0mWeJe/hFOfsvNKpRB3CkRxq8EW7QMheec1Sgd8prYxGm1OM9OZcGW7/GUud5Fw==" 					crossorigin="anonymous" />
	<title>Admin | profile</title>
</head>
<body>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" 				crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js" 									integrity="sha512-MqEDqB7me8klOYxXXQlB4LaNf9V9S0+sG1i8LtPOYmHqICuEZ9ZLbyV3qIfADg2UJcLyCm4fawNiFvnYbcBJ1w==" 					crossorigin="anonymous"></script>
	@csrf

    <div style="height: 50px"></div>
    <div class="container" style="background-color: #EEEEEE; padding: 50px 50px">
        <div style="text-align: center">
            <p style="font-size: 30px; color: orange"> {{ Str::ucfirst($data->user_roll) }}</p>
            <span>User name:<h5> {{ $data->username }}</h5></span>
            <span>Email:<h5> {{ $data->email }}</h5></span>
            <span>Password: <h5>{{ $data->password }}</h5></span>
            <span>Contact No:<h5> {{ $data->contact }}</h5></span>
            <span>Address:<h5> {{ $data->address }}</h5></span>
            <span>Joined at:<h5> {{ $data->created_at }}</h5></span>
        </div>
    </div>
</body>
</html>