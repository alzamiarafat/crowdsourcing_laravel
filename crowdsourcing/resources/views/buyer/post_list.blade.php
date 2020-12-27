@extends('layout/mainLayout')


@section('content')
@csrf
    <div>
        <table class="table table-borderless table-data3">
            <thead style="background-color: #404040;text-align: center;">
                <tr>
                    <th style="  padding: 6px 10px;">ID</th>
                    <th style="  padding: 6px 10px;">Title</th>
                    <th style="  padding: 6px 10px;">Status</th>
                    <th style="  padding: 6px 10px;">Description</th>
                    <th style="  padding: 6px 10px;">Price</th>
                    <th style="  padding: 6px 10px;">action</th>
                </tr>
            </thead>
            <tbody>
        		@for($i=0; $i < count($posts); $i++)
                <tr>
                    <td style="  padding: 6px 3px;text-align: center;">{{$posts[$i]['id']}}</td>
                    <td style="  padding: 6px 3px;text-align: center;">{{$posts[$i]['title']}}</td>
                    <td style="  padding: 6px 3px;text-align: center;">{{$posts[$i]['status']}}</td>
                    <td style="  padding: 6px 3px;text-align: center;">{{$posts[$i]['post_body']}}</td>
                    <td style="  padding: 6px 3px;text-align: center;">{{$posts[$i]['amount']}}</td>
                    <td style="  padding: 6px 3px;text-align: center;">
                        <a href="/buyer/edit_post/<%= pst.id %>"> <button type="button" class="btn btn-outline-info" style="height: 32px;">Edit</button></a> |
                        <a href="{{route('post_delete', $posts[$i]['id'])}}{{csrf_token()}}">Delete</a> |
                        <a href="{{route('post_available', $posts[$i]['id'])}}{{csrf_token()}}"><button type="button" class="btn btn-outline-success btn-sm">Available</button> |</a>
                        <a href="{{route('post_unavailable', $posts[$i]['id'])}}{{csrf_token()}}"><button type="button" class="btn btn-outline-warning btn-sm">Unavailable</button></a>
                    </td>
                 </tr> 
            </tbody>
            @endfor
        </table>
    </div>

    @if(Session::has('create_post'))

		<script>
			swal("Done!", "Post is Created", "success");
        </script>
    
	@elseif(Session::has('post_delete'))

		<script>
			swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this imaginary file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    swal("Poof! Your imaginary file has been deleted!", {
      icon: "success",
    });
  } else {
    swal("Your imaginary file is safe!");
  }
});
		</script>
	
	@endif
@endsection