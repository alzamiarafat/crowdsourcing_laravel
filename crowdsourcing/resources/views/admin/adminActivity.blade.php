@extends('layout.adminLayout')


@section('content')
<div style="height: 50px"></div>

<div class="container" style="background-color: #EEEEEE; padding: 50px 50px">
    <div class="" style="text-align: center">
        <h1>{{ $admin }}'s History</h1>
    
        {{-- handling if the admin doesn't have any history yet! --}}
        @if (Session::has('history'))
            <br><br>
            <h3 style="color: orange">{{ Session::get('history') }}</h3>
        @endif

        {{-- handling if the other server is not found! --}}
        @if (Session::has('error'))
            <br><br>
            <h2 style="color: red">404!</h2>
            <h3 style="color: red">{{ Session::get('error') }}</h3>
        @endif
    
        @foreach ($activities as $item)
            @if ($item["operation"] == 'delete')
                <div class="alert alert-success" role="alert">
                    <span>{{ $item['operation'] }} a {{ $item["user_roll"] }} at - {{ $item["created_at"] }}</span>
                </div>
            @elseif($item["operation"] == 'approved')
                <div class="alert alert-success" role="alert">
                    <span>{{ $item['operation'] }} a transaction of id ({{ $item["user_id"] }}) at - {{ $item["created_at"] }}</span>
                </div>
            @elseif($item["operation"] == 'added')
                <div class="alert alert-success" role="alert">
                    <span>{{ $item['operation'] }} an {{ $item["user_roll"] }} of id ({{ $item["user_id"] }}) at - {{ $item["created_at"] }}</span>
                </div>
            @elseif($item["operation"][0] == 'c')
                <div class="alert alert-success" role="alert">
                    <span>One {{ $item['operation'] }} at - {{ $item["created_at"] }}</span>
                </div>
            @endif
        @endforeach
    </div>
    
</div>
@endsection