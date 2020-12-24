@extends('layout/mainLayout')


@section('content')
@csrf
    <div>

    <h3>New Post</h3>
    <form method="post" action="">
    @csrf
    <table>
        <tr>
            <td>Buyer ID</td>
            <td>
                <input type="text" name="buyer_id" value="{{$user->id}}" style="background-color: #F0F1F1;height: 35px;width: 150%;text-align: center;" readonly>
            </td>
        </tr>
        <tr>
            <td>Buyer Name</td>
            <td>
                <input type="text" name="buyer_name" value="{{$user->full_name}}" style="background-color: #F0F1F1;height: 35px;width: 150%;text-align: center;" readonly>
            </td>
        </tr>

        <tr>
            <td>Title</td>
            <td>
                <textarea name="title" rows="2" cols="40" style="background-color: #F0F1F1;height: 35px;width: 150%;text-align: center;">
                </textarea>
            </td>
        </tr>								
        <tr>
            <td>Status</td>
            <td style="  padding: 6px 3px;"><input type="text" name="status" value="Available" style="background-color: #F0F1F1;height: 35px;width: 150%;text-align: center;"></td>
        </tr>
        <tr>
            <td>Description</td>
            <td style="  padding: 6px 3px;">
                <textarea name="post_body" rows="6" cols="50" style="background-color: #F0F1F1;height: 35px;width: 150%;text-align: center;">
                </textarea>
            </td>
        </tr>
        <tr>
            <td>Price</td>
            <td style="  padding: 6px 3px;"><input type="number" name="amount">
</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td> <input type="submit" name="submit" value="Submit" class="btn btn-success btn-lg" style="position: relative; left:500px;top: 30px; width: 30%;"></td>
                                    </tr><br><br>
                                </table>
                            </form>
</div>

@if(Session::has('create_post'))

		<script>
			swal("Inserted!", "Profile Picture is updated", "success");
		</script>
	@endif
@endsection