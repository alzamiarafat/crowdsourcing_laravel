<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ Session::get('user')->username }} | {{ $title }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    

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
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <h3><a class="navbar-brand" href="#">Crowd Sourcing</a></h3>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('adminDashboard') }}">Dashboard</a>
              </li>
              
              <li class="nav-item dropdown">
                
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" type="button"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Categories
                    </a>
                    
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#">See Categories</a>
                      <a class="dropdown-item" href="#">Add Category</a>
                    </div>
                </div>
              </li>
              <li class="nav-item dropdown">
                
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" type="button"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Add People
                    </a>
                    
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#">Add Admin</a>
                    </div>
                </div>
              </li>
              <li class="nav-item dropdown">
                
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" type="button"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Operations
                    </a>
                    
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#">Admins</a>
                      <a class="dropdown-item" href="#">Buyers</a>
                      <a class="dropdown-item" href="#">Sellers</a>
                    </div>
                </div>
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
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Reset Password</a>
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