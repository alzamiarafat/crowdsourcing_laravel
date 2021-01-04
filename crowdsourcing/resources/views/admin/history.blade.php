@extends('layout.AdminLayout')

@section('content')
<div style="height: 50px"></div>
<div class="container" style="background-color: #EEEEEE; padding: 50px 50px">
    @if ($topic == 'buyer')
        @if (!empty($histories))
            <h1 style="text-align: center">{{ $who }}'s History</h1>
            <div class="alert alert-secondary" role="alert">
                <strong>Name: {{ $histories[0]->full_name }}</strong> <br>
                <strong>Email: {{ $histories[0]->email }}</strong> <br>
                <strong>Contact: {{ $histories[0]->contact }}</strong> <br>
                <strong>Address: {{ $histories[0]->address }}</strong> <br>
            
            </div>
            <br><br>
            @foreach ($histories as $history)
            <div class="alert alert-success" role="alert">
                <h5>{{ $history->title }}</h5>
                <span><strong>Category:</strong> {{ $history->category_name }}</span><br>
                <strong>Description:</strong>
                <p>{{ $history->post_body }}</p>
                <strong>paid: ${{ $history->amount }}</strong><br>
                <span>Worked by <a style="text-decoration: none; color: purple" href="{{ route('profileView', $history->seller_id) }}">{{ $history->seller_name }}</a> </span>
                <br>
                <span>Date: {{ $history->created_at }}</span>
            </div>

            @endforeach
        @else
            <h1 style="text-align: center">{{ $who->full_name }}'s History</h1>

            <div class="alert alert-secondary" role="alert">
                <strong>Name: {{ $who->full_name }}</strong> <br>
                <strong>Email: {{ $who->email }}</strong> <br>
                <strong>Contact: {{ $who->contact }}</strong> <br>
                <strong>Address: {{ $who->address }}</strong> <br>
            
            </div>
            <br><br>
            <div class="alert alert-warning" role="alert">
                <h4 style="text-align: center">There's No History!</h4>
            </div>
        @endif
    @elseif($topic == 'seller')
        @if (!empty($histories))
                <h1 style="text-align: center">{{ $who->full_name }}'s History</h1>
                <div class="alert alert-secondary" role="alert">
                    <strong>Name: {{ $who->full_name }}</strong> <br>
                    <strong>Email: {{ $who->email }}</strong> <br>
                    <strong>Contact: {{ $who->contact }}</strong> <br>
                    <strong>Address: {{ $who->address }}</strong> <br>
                
                </div>
                <br><br>
                @foreach ($histories as $history)
                    <div class="alert alert-success" role="alert">
                        <h5>{{ $history->title }}</h5>
                        <span><strong>Category:</strong> {{ $history->category_name }}</span><br>
                        <strong>Description:</strong>
                        <p>{{ $history->post_body }}</p>
                        <strong>payment: ${{ $history->amount }}</strong><br>
                        <span>Worked with <a style="text-decoration: none; color: purple" href="{{ route('profileView', $history->buyer_id) }}">{{ $history->buyer_name }}</a> </span>
                        <br>
                        <span>Date: {{ $history->created_at }}</span>
                    </div>

                @endforeach
        @else
            <h1 style="text-align: center">{{ $who->full_name }}'s History</h1>

            <div class="alert alert-secondary" role="alert">
                <strong>Name: {{ $who->full_name }}</strong> <br>
                <strong>Email: {{ $who->email }}</strong> <br>
                <strong>Contact: {{ $who->contact }}</strong> <br>
                <strong>Address: {{ $who->address }}</strong> <br>
            </div>
            <div class="alert alert-warning" role="alert">
                <h4 style="text-align: center">There's No History!</h4>
            </div>        
        @endif
    @endif
</div>   
@endsection