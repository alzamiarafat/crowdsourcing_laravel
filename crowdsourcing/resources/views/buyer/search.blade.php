@extends('layout/mainLayout')


@section('content')
@csrf
<div class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
                <div style="margin-left: 60px">
        <legend>Search User</legend>
        <form method="POST" action="">
            @csrf
        
            
      
        <input class ="form-control my-3 search-input" type="search" name="searchItem" id="mytext" style="width: 200%" placeholder="Search By Username" aria-label="Search">
        <div class="input-group-append">
          <button  name="submit" value="Submit" class="btn btn-success" type="submit" style="position: relative;left: 400px;top: -55px">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    
            
                <div class="card-header" style="position: relative;left: 60px;width: 200%">Search Results</div>
                <div class="list-group list-group-flush search-result" style="position: relative;left: 60px;width: 200%">

                </div>

            </div>
        </div>
        <!-- <input type="button" id="ajaxSearch" value="Search"> -->
    </form>


  </div>
</div>


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
                              _html+='<li class="list-group-item">'+data.username+'</li>';
                           });
                           $(".search-result").html(_html);
                            
                        }
                    });
                }
            });
        });
    </script>
    <div style="padding: 150px 100px"></div>

@endsection