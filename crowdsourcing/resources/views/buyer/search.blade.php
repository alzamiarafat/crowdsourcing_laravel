@extends('layout/mainLayout')


@section('content')
@csrf


    <fieldset>
        <legend>Search User</legend>
        <form method="POST" action="">
            @csrf
        <div class="container">
            <input type="text" name="searchItem" class ="form-control my-3 search-input" id="mytext" placeholder="Search here">
            <button name="submit" value="Submit" class="btn btn-secondary">Search</button>
            <div class="card">
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
                           $(".search-result").html('<div class="card-header">Search Results</div> <li class="list-group-item">Loading...</li>'); 
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

@endsection