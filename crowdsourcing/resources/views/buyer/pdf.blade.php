<!DOCTYPE html>
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 						integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css" 					integrity="sha512-hwwdtOTYkQwW2sedIsbuP1h0mWeJe/hFOfsvNKpRB3CkRxq8EW7QMheec1Sgd8prYxGm1OM9OZcGW7/GUud5Fw==" 					crossorigin="anonymous" />
	<title>Buyer|Portal</title>
</head>
<body>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" 				crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js" 									integrity="sha512-MqEDqB7me8klOYxXXQlB4LaNf9V9S0+sG1i8LtPOYmHqICuEZ9ZLbyV3qIfADg2UJcLyCm4fawNiFvnYbcBJ1w==" 					crossorigin="anonymous"></script>
	@csrf

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


</body>
</html>