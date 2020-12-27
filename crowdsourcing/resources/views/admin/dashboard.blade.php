@extends('layout.adminLayout')

@section('content')
<div style="height: 50px"></div>



<div style="height: 50px"></div>

<div style="margin-left: 80px">
    
<div class="container" >
    <div class="row">
      <div class="col-sm">
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('carouse_imgs/1.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title title-style">Total Buyers</h5>
              <h1 class="card-text title-style" style="color: red">{{ $buyersCount }}</h1>
            </div>
          </div>
      </div>
      <div class="col-sm">
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('carouse_imgs/2.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title title-style">Total Sellers</h5>
              <h1 class="card-text title-style" style="color: blue">{{ $sellersCount }}</h1>
            </div>
          </div>
      </div>
      <div class="col-sm">
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('carouse_imgs/3.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title title-style">Total People</h5>
              <h1 class="card-text title-style" style="color: green">{{ $newJoined }}</h1>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>

<div style="height: 50px"></div>

<div style="background-color: black; color: white; text-align: center; padding: 10px 5px" class="container">
    <h5>Admins Lists</h5>
</div>
<div class="container scroll">
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Username</th>
            <th scope="col">Contact</th>
            <th scope="col">Address</th>
            <th scope="col">Joined at</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        
            @foreach ($admins as $admin)
            <tr>
                <th scope="row">{{ $admin->id }}</th>
                <td>{{ $admin->username }}</td>
                <td>{{ $admin->contact }}</td>
                <td>{{ $admin->address }}</td>
                <td>{{ $admin->created_at }}</td>
                <td>
                    <a href="{{ route('profileView', $admin->id) }}" class="btn btn-secondary">View profile</a>
                </td>
            </tr>
            @endforeach
          
          
        </tbody>
      </table>
</div>

<div style="height: 50px"></div>

<div style="background-color: black; color: white; text-align: center; padding: 10px 5px" class="container">
    <h5>Buyers Lists</h5>
</div>
<div class="container scroll">
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Username</th>
            <th scope="col">Contact</th>
            <th scope="col">Address</th>
            <th scope="col">Joined at</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        
            @foreach ($buyers as $buyer)
            <tr>
                <th scope="row">{{ $buyer->id }}</th>
                <td>{{ $buyer->username }}</td>
                <td>{{ $buyer->contact }}</td>
                <td>{{ $buyer->address }}</td>
                <td>{{ $buyer->created_at }}</td>
                <td>
                    <a href="{{ route('profileView', $buyer->id) }}" class="btn btn-secondary">View profile</a>
                </td>
            </tr>
            @endforeach
          
          
        </tbody>
      </table>
</div>

<div style="height: 50px"></div>

<div style="background-color: black; color: white; text-align: center; padding: 10px 5px" class="container">
    <h5>Sellers Lists</h5>
</div>
<div class="container scroll">
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Username</th>
            <th scope="col">Contact</th>
            <th scope="col">Address</th>
            <th scope="col">Joined at</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        
            @foreach ($sellers as $seller)
            <tr>
                <th scope="row">{{ $seller->id }}</th>
                <td>{{ $seller->username }}</td>
                <td>{{ $seller->contact }}</td>
                <td>{{ $seller->address }}</td>
                <td>{{ $seller->created_at }}</td>
                <td>
                    <a href="{{ route('profileView', $seller->id) }}" class="btn btn-secondary">View profile</a>
                </td>
            </tr>
            @endforeach
          
          
        </tbody>
      </table>
</div>

<div style="height: 50px"></div>

@endsection