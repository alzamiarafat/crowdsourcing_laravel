@extends('layout.adminLayout')

@section('content')
<div style="height: 50px"></div>

<div class="container" style="background-color: #EEEEEE; padding: 50px 50px">
    @if ($topic == 'admin_list')
        {{-- Admin table --}}
        <div style="background-color: black; color: white; text-align: center; padding: 10px 5px"">
            <h5>Admins Lists</h5>
        </div>

        <div style="height: 15px"></div>

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
    @elseif($topic == 'buyer_list')
        {{-- Buyers List --}}
        <div style="background-color: black; color: white; text-align: center; padding: 10px 5px">
            <h5>Buyers Lists</h5>
        </div>

        <div style="height: 15px"></div>

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
    @elseif($topic == 'seller_list')
        {{-- Sellers List --}}
        <div style="background-color: black; color: white; text-align: center; padding: 10px 5px">
            <h5>Sellers Lists</h5>
        </div>
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
    @endif
</div>
@endsection