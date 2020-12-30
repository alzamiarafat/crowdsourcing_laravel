@extends('layout/mainLayout')


@section('content')
@csrf
    <div>
        <table class="table table-borderless table-data3">
            <thead style="background-color: #404040;text-align: center;">
                <tr>
                    <th style="  padding: 6px 10px;">Name</th>
                    <th style="  padding: 6px 10px;">Title</th>
                    <th style="  padding: 6px 10px;">Status</th>
                    <th style="  padding: 6px 10px;">Description</th>
                    <th style="  padding: 6px 10px;">Seller Name</th>
                    <th style="  padding: 6px 10px;">Category</th>
                    <th style="  padding: 6px 10px;">Contact</th>
                    <th style="  padding: 6px 10px;">Price</th>
                    <th style="  padding: 6px 10px;">action</th>
                </tr>
            </thead>
            <tbody>
        		@for($i=0; $i < count($history); $i++)
                <tr>
                    <td style="  padding: 6px 3px;text-align: center;">{{$history[$i]-> full_name}}</td>
                    <td style="  padding: 6px 3px;text-align: center;">{{$history[$i]-> title}}</td>
                    <td style="  padding: 6px 3px;text-align: center;">{{$history[$i]-> status}}</td>
                    <td style="  padding: 6px 3px;text-align: center;">{{$history[$i]-> post_body}}</td>
                    <td style="  padding: 6px 3px;text-align: center;">{{$history[$i]-> seller_name}}</td>
                    <td style="  padding: 6px 3px;text-align: center;">{{$history[$i]-> category_name}}</td>
                    <td style="  padding: 6px 3px;text-align: center;">{{$history[$i]-> contact}}</td>
                    <td style="  padding: 6px 3px;text-align: center;">{{$history[$i]-> amount}}</td>

                    <td style="  padding: 6px 3px;text-align: center;">
                        
                        <a href="{{route('post_delete', $history[$i]-> id)}}{{csrf_token()}}">Delete</a> |
                        
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