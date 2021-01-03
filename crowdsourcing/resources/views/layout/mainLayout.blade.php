
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ Session::get('user')->username }} | Portal</title>
	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 						integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css" 					integrity="sha512-hwwdtOTYkQwW2sedIsbuP1h0mWeJe/hFOfsvNKpRB3CkRxq8EW7QMheec1Sgd8prYxGm1OM9OZcGW7/GUud5Fw==" 					crossorigin="anonymous" />
	
    <style>
        .counter .counter-lg {
            top: -24px !important;
            font-size: 5px;
        }
        .title-style{
          text-align: center;
        }
        .footer{
          
          color: aliceblue;
          background-color: rgb(13, 20, 20);
          padding: 15px 5px;
          text-align: center;
        }
        .spacefooter{
          height: 100px;
        }
        .scroll { 
                margin:4px, 4px; 
                padding:4px;  
                width: 500px; 
                height: 300px; 
                overflow-x: hidden; 
                overflow-y: auto; 
                text-align:justify; 
            }
    </style>
</head>
<body>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" 				crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js" 									integrity="sha512-MqEDqB7me8klOYxXXQlB4LaNf9V9S0+sG1i8LtPOYmHqICuEZ9ZLbyV3qIfADg2UJcLyCm4fawNiFvnYbcBJ1w==" 					crossorigin="anonymous"></script>
	
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <h3><a class="navbar-brand" href="#">Crowd Sourcing</a></h3>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{route('dashboard',csrf_token())}}">Dashboard</a>
              </li>
              
              <li class="nav-item dropdown">
                
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" type="button"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Operation
                    </a>
                    
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="{{route('create_post',csrf_token())}}">Write Post</a>
                    </div>
                </div>
              </li>
              <li class="nav-item dropdown">
                
				
				
              </li>
              <li class="nav-item dropdown">
				  
                
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" type="button"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Tables
                    </a>
                    
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="{{route('sellers',csrf_token())}}">Sellers</a>
                      <a class="dropdown-item" href="{{route('post_list',csrf_token())}}">Posts</a>
                      
                    </div>
                </div>
			  </li>
			  <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{route('history',csrf_token())}}">History</a>
              </li>
              
              <li class="nav-item">
                  <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
              </li>
            </ul>

            <div class="nav-item dropdown" style="width: 35px">
                
                <div class="icon-bar nav-link dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <a style="color: darkgray" href="#"><i class="fa fa-bell"></i></a><span style="font-size: 10px; color: red">1</span>
                </div>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <p class="dropdown-item">notification ---------------</p>
                    <p class="dropdown-item">notification ---------------</p>
                </div>
            </div>
            <div style="width: 10px"></div>
            <div class="nav-item dropdown" style="width: 50px">
                
                <div class="icon-bar nav-link dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <a style="color: darkgray" href="#"><i class="fa fa-envelope"></i></a><span style="font-size: 10px; color: red">1</span>
                </div>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <p class="dropdown-item">message --------------------</p>
                    <p class="dropdown-item">message --------------------</p>
                </div>
            </div>
            
            


            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" type="button" style="color: white"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{ Session::get('user')->full_name }}
                </a>
                
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{ route('profile', Session::get('user')->id) }}">Profile</a>
                  <a class="dropdown-item" href="">Reset Password</a>
                  <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                </div>
            </div>
            
          </div>
        </div>
      </nav>

      @yield('content')

      <div class="spacefooter">

      </div>
      <div class="footer">
        &copy; Copyright 
        <span style="font-size: 10px">Advance Programing and Web Technology Course project</span>
        <p style="font-size: 10px; margin-top: 10px">Al Zami Arafat & Saqib Aminul Islam</p>
      </div>

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>