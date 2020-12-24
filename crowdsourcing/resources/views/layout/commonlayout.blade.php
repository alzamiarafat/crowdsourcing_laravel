<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	
	<style>
		.vertical-center {
			min-height: 100%;  /* Fallback for browsers do NOT support vh unit */
			min-height: 100vh; /* These two lines are counted as one :-)       */

			display: flex;
			align-items: center;
		}
		.content-center{
			width: 700px;
			height: 850px;
			margin-left: 25%;
			margin-top: 10%;
		}
		.logo{
			margin-left: 50px;
		}
	</style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>


	<nav class="navbar navbar-light bg-light">
		<a href="/" class="navbar-brand">CROWDSOURCE</a>
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a href="/" class="nav-link">Home</a>
			</li>
			 
		</ul>
		<ul class="navbar-nav" style="padding: 5px">
			<li class="nav-item">
				<a href="/login" class="nav-link">Login</a>
			</li>
		</ul>
		<ul class="navbar-nav" style="padding: 5px">
			<li class="nav-item">
				<a href="/registration" class="nav-link">Registration</a>
			</li>
		</ul>
	</nav>


@yield('content')


    
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>





</body>


</html>