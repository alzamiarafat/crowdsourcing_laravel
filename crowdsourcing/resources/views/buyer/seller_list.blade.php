@extends('layout/mainLayout')


@section('content')
@csrf
<div class="container" style="background-color: #EEEEEE; padding: 50px 100px">
    <div class="d-flex justify-content-center">
        <table class="table table-borderless table-data3"  style="text-align: center">
            <thead style="background-color: #404040;text-align: center;">
                <tr style="color: white">
                    <th >ID</th>
                    <th >Name</th>
                    <th >Category</th>
                    <th >Buyer Name</th>
                    <th >Project Title</th>
                    <th >Action</th>
                </tr>
            </thead>
            <tbody>
        		@for($i=0; $i < count($sellers); $i++)
                <tr style="background-color: white">
                    <td style="  padding: 40px 3px;">{{$sellers[$i]['seller_id']}}</td>
                    <td style="  padding: 40px 3px;">{{$sellers[$i]['seller_name']}}</td>
                    <td style="  padding: 40px 3px;">{{$sellers[$i]['category_name']}}</td>
                    <td style="  padding: 40px 3px;">{{$sellers[$i]['buyer_name']}}</td>
                    <td style="  padding: 40px 3px;">{{$sellers[$i]['project_title']}}</td>

                    <td style="  padding: 40px 3px;">
                        <a href="/buyer/message/<%=s.user_id%>"><button type="button" class="btn btn-outline-success btn-sm">Chat</button></a>   |
                        <a href="{{route('seller_profile', $sellers[$i]['seller_id'])}}{{csrf_token()}}"><button type="button" class="btn btn-outline-primary btn-sm">Details</button></a>

                    </td>
                 </tr> 
            </tbody>
            @endfor
        </table>
    </div>

    
@endsection