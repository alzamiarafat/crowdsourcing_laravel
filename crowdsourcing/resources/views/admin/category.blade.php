@extends('layout.adminLayout')

@section('content')
<div style="height: 50px"></div>

<div class="container" style="background-color: #EEEEEE; padding: 50px 50px">

    @if ($topic == 'add_category')
    {{-- Category adding option --}}
        <div style="text-align: center">
            <h3>Add new Category</h3>
            <br><br>
            <form action="" method="POST">
                @csrf
                <input type="text" name="category_name" placeholder="Category name" style="width: 500px" required><br><br>
                @error('category_name')
                    <span style="color: darkorange">*{{ $message }}</span> 
                    <br><br>                   
                @enderror
                <button class="btn btn-primary">Add new category</button>
            </form>
        </div>
    @elseif($topic == 'see_category')
    {{-- see all categories option --}}
        <div>
            <h3  style="text-align: center">Categories</h3><br>
            @if (!empty($categories))
                @foreach ($categories as $category)
                    <div class="alert alert-success" role="alert">
                        <span style="margin-left: 50px">{{ $category->category_name }}</span>
                    </div>
                @endforeach
            @else 
                <div class="alert alert-primary" style="text-align: center" role="alert">
                    <span style="margin-left: 50px">Empty!</span>
                </div>
            @endif
        </div>
    
    @endif
    
</div>
@endsection