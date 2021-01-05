@extends('layout/mainLayout')


@section('content')
@csrf
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<div class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$available_post}}</h3>

                <p>New Posts</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#posts" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$unavailable_post}}</h3>

                <p>Old Posts</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#posts" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$sellers}}</h3>

                <p>Sellers</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{route('sellers',csrf_token())}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$own_post}}</h3>

                <p>Own Posts</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{route('post_list',csrf_token())}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

<div class="container" style=" padding: 50px 50px">
            <!-- Box Comment -->
            @foreach ($posts as $post)
            <div id="posts" class="card card-widget">
              <div class="card-header">
                
                <div class="user-block">
                  <img style="border-radius: 50%;" id="previewImg" src="{{asset('uploads/'.$post->profile_image)}}" width="50" >
                  <span class="username"><a href="#">{{$post->buyer_name}}</a></span>
                </div>
                <!-- /.user-block -->
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" title="Mark as read">
                    <i class="far fa-circle"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- post text -->
                <p>{{$post->title}}</p>

                <p>{{$post->post_body}}</p>


                <!-- Social sharing buttons -->
                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
                <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button>
                <span class="float-right text-muted">45 likes - 2 comments</span>
              </div>
              
             
            </div><br>
            @endforeach
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div></div>

        @endsection