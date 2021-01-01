@extends('layout.adminLayout')

@section('content')
<div style="height: 50px"></div>

<div class="container" style="background-color: #EEEEEE; padding: 50px 50px">
    
    {{-- <div class="row">
        <h1>Are you sure?</h1>
    </div> --}}
    <div style="text-align: center">
        <h1>Are you sure?</h1>
        <br><br>
        <h3>Do you want to {{ $opearation }}</h3>

        <br><br>

        <div style="text-align: center">
            <a href="{{ route('delete-sure', $id) }}" class="btn btn-danger">Yes</a>
            <a href="{{ route('profileView', $id) }}" class="btn btn-success">No</a>
        </div>
    </div>
        
</div>

@endsection