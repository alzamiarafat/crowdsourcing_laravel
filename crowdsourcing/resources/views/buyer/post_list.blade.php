@extends('layout/mainLayout')


@section('content')
@csrf
<div class="container" style="background-color: #EEEEEE; padding: 50px 40px">
    <div class="d-flex justify-content-center">
        <table class="table table-borderless table-data3">
            <thead style="background-color: #404040;text-align: center;">
                
                <tr style=" color: white">
                    <th >ID</th>
                    <th >Title</th>
                    <th >Status</th>
                    <th >Description</th>
                    <th >Price</th>
                    <th >action</th>
                </tr>
            </thead>
            <tbody>
        		@for($i=0; $i < count($posts); $i++)
                <tr style="background-color: white">
                    <td style="  padding: 35px 6px;text-align: center;">{{$posts[$i]['id']}}</td>
                    <td style="  padding: 30px 6px;text-align: center;">{{$posts[$i]['title']}}</td>

                    @if($posts[$i]['status']== 'Available')

                    <td style="  padding: 30px 6px;text-align: center; color: green">{{$posts[$i]['status']}}</td>
                    @else
                    <td style="  padding: 30px 6px;text-align: center; color: red">{{$posts[$i]['status']}}</td>
                    @endif
                    <td style="  padding: 30px 3px;text-align: center;">{{$posts[$i]['post_body']}}</td>
                    <td style="  padding: 30px 6px;text-align: center;">{{$posts[$i]['amount']}}</td>
                    <td style="  padding: 30px 0px;text-align: center;">
                        <a href="{{route('post_edit', $posts[$i]['id'])}}?{{csrf_token()}}"> <button type="button" class="btn btn-outline-info" style="height: 32px;">Edit</button></a> |
                        <a href="{{route('post_delete', $posts[$i]['id'])}}"><button type="button" class="btn btn-outline-danger btn-sm" onclick="check()">Delete</button></a>
                        <a href="{{route('post_available', $posts[$i]['id'])}}{{csrf_token()}}"><button type="button" class="btn btn-outline-success btn-sm">Available</button></a> |
                        <a href="{{route('post_unavailable', $posts[$i]['id'])}}{{csrf_token()}}"><button type="button" class="btn btn-outline-warning btn-sm">Unavailable</button></a>
                    </td>
                 </tr> 
            </tbody>
            @endfor
        </table>
    </div>

    @if(Session::has('create_post'))

		<script>
			swal("Done!", "Post has been created", "success");
        </script>
        @elseif(Session::has('update_post'))

    <script>
      swal("Updated!", "Post has been updated", "success");
        </script>
    

		
	
	@endif
@endsection