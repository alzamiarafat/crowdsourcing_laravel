@extends('layout/mainLayout')


@section('content')
@csrf
<div class="container" style="background-color: #EEEEEE; padding: 60px 10px">
    <div class="d-flex justify-content-center">
        <table class="table table-borderless table-data3"  style="text-align: center">
            <thead style="background-color: #404040;text-align: center;">
                <tr style="color: white">
                    <th >Name</th>
                    <th >Title</th>
                    <th >Status</th>
                    <th >Description</th>
                    <th >Seller Name</th>
                    <th >Category</th>
                    <th >Contact</th>
                    <th >Price</th>
                    <th >action</th>
                </tr>
            </thead>
            <tbody>
        		@for($i=0; $i < count($history); $i++)
                <tr>
                    <td style="  padding: 40px 3px;text-align: center;">{{$history[$i]-> full_name}}</td>
                    <td style="  padding: 40px 3px;text-align: center;">{{$history[$i]-> title}}</td>
                    <td style="  padding: 40px 3px;text-align: center;">{{$history[$i]-> status}}</td>
                    <td style="  padding: 40px 3px;text-align: center;">{{$history[$i]-> post_body}}</td>
                    <td style="  padding: 40px 3px;text-align: center;">{{$history[$i]-> seller_name}}</td>
                    <td style="  padding: 40px 3px;text-align: center;">{{$history[$i]-> category_name}}</td>
                    <td style="  padding: 40px 3px;text-align: center;">{{$history[$i]-> contact}}</td>
                    <td style="  padding: 40px 3px;text-align: center;">{{$history[$i]-> amount}}</td>

                    <td style="  padding: 40px 3px;text-align: center;">
                        
                        <a href="{{route('history_delete', $history[$i]-> id)}}{{csrf_token()}}">Delete</a> |
                        <a href="{{route('download')}}?{{csrf_token()}}">Download</a>
                        
                    </td>
                 </tr> 
            </tbody>
            @endfor
        </table>
        <div style="padding: 200px 100px"></div>
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