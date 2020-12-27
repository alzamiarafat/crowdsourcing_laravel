@extends('layout/mainLayout')


@section('content')
@csrf
    <div>
        <table class="table table-borderless table-data3"  style="text-align: center">
            <thead style="background-color: #404040;text-align: center;">
                <tr>
                    <th style="  padding: 6px 10px;">ID</th>
                    <th style="  padding: 6px 10px;">Name</th>
                    <th style="  padding: 6px 10px;">Category</th>
                    <th style="  padding: 6px 10px;">Buyer Name</th>
                    <th style="  padding: 6px 10px;">Project Title</th>
                    <th style="  padding: 6px 10px;">action</th>
                </tr>
            </thead>
            <tbody>
        		@for($i=0; $i < count($sellers); $i++)
                <tr>
                    <td style=" padding: 6px 3px;">{{$sellers[$i]['seller_id']}}</td>
                    <td style="  padding: 6px 3px;">{{$sellers[$i]['seller_name']}}</td>
                    <td style="  padding: 6px 3px;">{{$sellers[$i]['category_name']}}</td>
                    <td style="  padding: 6px 3px;">{{$sellers[$i]['buyer_name']}}</td>
                    <td style="  padding: 6px 3px;">{{$sellers[$i]['project_title']}}</td>

                    <td style="  padding: 6px 3px;">
                        <a href="/buyer/message/<%=s.user_id%>"><button type="button" class="btn btn-outline-success btn-sm">Chat</button></a>   |
                        <a href="/buyer/details/<%=s.user_id%>"><button type="button" class="btn btn-outline-primary btn-sm">Details</button></a>

                    </td>
                 </tr> 
            </tbody>
            @endfor
        </table>
    </div>

    
@endsection