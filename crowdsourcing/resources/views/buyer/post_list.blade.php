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
        
                <tr>
                    <td style="  padding: 6px 3px;"><%= pst.id %></td>
                    <td style="  padding: 6px 3px;"><%= pst.title %></td>
                    <td style="  padding: 6px 3px;"><%= pst.status %></td>
                    <td style="  padding: 6px 3px;"><%= pst.post_body %></td>
                    <td style="  padding: 6px 3px;"><%= pst.amount %></td>
                    <td style="  padding: 6px 3px;">
                        <a href="/buyer/edit_post/<%= pst.id %>"> <button type="button" class="btn btn-outline-info" style="height: 32px;text-align: center;">Edit</button></a> |
                        <a href="/buyer/delete/<%= pst.id %>"><button type="button" class="btn btn-outline-danger btn-sm">Delete</button></a> |
                        <a href="/buyer/available/<%= pst.id %>/<%= 'Available' %>"><button type="button" class="btn btn-outline-success btn-sm">Available</button> |</a>
                        <a href="/buyer/available/<%= pst.id%>/<%= 'Unavailable' %>"><button type="button" class="btn btn-outline-warning btn-sm">Unavailable</button></a>
                    </td>
                 </tr> 
            </tbody>
        </table>
    </div>

    @if(Session::has('create_post'))

		<script>
			swal("Success!", "Post is inserted", "success");
		</script>
	@endif
@endsection