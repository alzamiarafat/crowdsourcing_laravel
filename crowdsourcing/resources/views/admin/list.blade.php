@extends('layout.adminLayout')

@section('content')
<div style="height: 50px"></div>

<div class="container" style="background-color: #EEEEEE; padding: 50px 50px">
    @if ($topic == 'admin_list')
        <h1>Admin List</h1>
    @elseif($topic == 'buyer_list')
        <h1>Buyer List</h1>
    @elseif($topic == 'seller_list')
        <h1>Seller List</h1>
    @endif
</div>
@endsection