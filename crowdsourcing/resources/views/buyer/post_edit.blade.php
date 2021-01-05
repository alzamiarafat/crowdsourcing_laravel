@extends('layout/mainLayout')


@section('content')
@csrf
<div class="container" style="background-color: #EEEEEE; padding: 50px 50px">
    <div class="d-flex justify-content-center">
        <form method="POST">
            <h2>Update Post</h2>
            @csrf      

            <span style="padding-left: 30px">
                <input type="hidden" name="buyer_id" placeholder="Full Name" value="{{ Session::get('user')->id }}" readonly/>
            </span>
               
            <span style="padding-left: 5px">
                <input type="hidden" name="buyer_name" value="{{ Session::get('user')->full_name}}" readonly>
            </span>
                

            <div style="padding: 10px 15px">
                <span style="padding-right: 50px;">Title</span>
                <span style="padding-left: 10px;">
                
                    <textarea name="title" rows="2" cols="40">{{$find_post->title}}</textarea>
                    
                </span>

                @error('title')
                        <br>
                            <span style="color: red; font-size: 14px;">*{{ $message }}</span>
                        @enderror
            </div>

            <div style="padding: 10px">
                <span style="padding-right: 50px">Status</span>
                <span style="padding-left: 5px">
                    <input type="text" name="status" placeholder="Available/Unavailable" value="{{$find_post->status}}">
                </span>
                @error('status')
                        <br>
                            <span style="color: red; font-size: 14px;">*{{ $message }}</span>
                        @enderror
            </div>

            <div style="padding: 10px">
                <span style="padding-right: 10px">Description</span>
                <span style="padding-left: 5px">
                    <textarea name="post_body" rows="6" cols="50">{{$find_post->post_body}}</textarea>
                </span>
            </div>

            <div style="padding: 10px">
                <span style="padding-right: 55px">Price</span>
                <span style="padding-left: 5px">
                    <input type="number" name="amount" value="{{$find_post->amount}}">
                </span>
            </div>

            <tr>
                <td></td>
                <td> 
                    <input type="submit" name="submit" value="Submit" class="btn btn-success btn-lg" style="position: relative; left:170px;top: 30px; width: 50%;">
                </td>
            </tr>
            <br><br>
                                
        </form>
    </div>
</div>


@endsection

