<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <title>Search</title>
</head>
<body>
    <fieldset>
        <legend>Search User</legend>
        <form method="POST" action="">
            @csrf
        <div class="container">
            <input type="text" name="searchItem" class ="form-control my-3 search-input" id="mytext" placeholder="Search here">
            <button name="submit" value="Submit" class="btn btn-secondary">Search</button>
            <div class="card">
                <div class="card-header">Search Results</div>
                <div class="list-group list-group-flush search-result">

                </div>

            </div>
        </div>
        <!-- <input type="button" id="ajaxSearch" value="Search"> -->
    </form>


    </fieldset>

    <script type="text/javascript">
        $(document).ready(function(){
            $(".search-input").on('keyup',function () {
                var _q=$(this).val();
                var q;
                if(_q.length>=1){
                    $.ajax({
                        url: "{{route('search')}}",
                        data:{
                            q:_q
                        },
                        datatype:'json',
                        beforeSend:function () {
                           $(".search-result").html('<li class="list-group-item">Loading...</li>'); 
                        },
                        success: function (res) {
                           var _html = '';
                           $.each(res.data,function (index,data) {
                              _html+='<li class="list-group-item">'+data.full_name+'</li>';
                           });
                           $(".search-result").html(_html);
                            
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
