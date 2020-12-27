@extends('layout.adminLayout')

@section('content')
<div style="height: 50px"></div>


    {{-- <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('carouse_imgs/1.jpg') }}" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>My Caption Title (1st Image)</h5>
                        <p>The whole caption will only show up if the screen is at least medium size.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('carouse_imgs/2.jpg') }}" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="https://placeimg.com/1080/500/nature" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div> --}}




<div style="height: 50px"></div>


<div class="container" style="margin-left: 140px">
    <div class="row">
      <div class="col-sm">
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('carouse_imgs/1.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title title-style">Total Buyers</h5>
              <h1 class="card-text title-style">{{ $buyersCount }}</h1>
            </div>
          </div>
      </div>
      <div class="col-sm">
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('carouse_imgs/2.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title title-style">Total Sellers</h5>
              <h1 class="card-text title-style">{{ $sellersCount }}</h1>
            </div>
          </div>
      </div>
      <div class="col-sm">
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('carouse_imgs/3.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title title-style">Total People</h5>
              <h1 class="card-text title-style">{{ $newJoined }}</h1>
            </div>
          </div>
      </div>
    </div>
  </div>

<div style="height: 50px"></div>


<div class="container">
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>
</div>


@endsection