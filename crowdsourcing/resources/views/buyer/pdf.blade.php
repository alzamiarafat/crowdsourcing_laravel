<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"                         integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css"                  integrity="sha512-hwwdtOTYkQwW2sedIsbuP1h0mWeJe/hFOfsvNKpRB3CkRxq8EW7QMheec1Sgd8prYxGm1OM9OZcGW7/GUud5Fw=="                     crossorigin="anonymous" />
    <title>Buyer|Portal</title>
</head>
<body>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="               crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"                                   integrity="sha512-MqEDqB7me8klOYxXXQlB4LaNf9V9S0+sG1i8LtPOYmHqICuEZ9ZLbyV3qIfADg2UJcLyCm4fawNiFvnYbcBJ1w=="                     crossorigin="anonymous"></script>
    @csrf
<div class="wrapper">

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i>Crowd Sourcing
                    <small class="float-right">Date: 2/10/2014</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">


                <table border="1">
                  
                    <tr>
                      <td>From</td>
                      <td> <strong>{{Session::get('user')->full_name}}</strong></td>
                  </tr>
                  <tr>
                      <td>To</td><td><strong>Sakib AL Hasan</strong></td>
                  </tr>
                  <tr>
                      <td>Details</td>
                      <td><b>Order ID:</b>1<br>
                     <b>Payment Due:</b> 2/22/2014<br>
                    <b>Account:</b> 4364$<br>
              </td>
                  </tr>
                      

                  </table>

                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Qty</th>
                       <th>Name</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Description</th>
                            <th>Seller Name</th>
                            <th>Category</th>
                            <th>Contact</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                          @for($i=0; $i < count($history); $i++)
                         <td>{{$history[$i]-> id}}</td>
                        <td>{{$history[$i]-> full_name}}</td>
                        <td >{{$history[$i]-> title}}</td>
                        <td >{{$history[$i]-> status}}</td>
                        <td >{{$history[$i]-> post_body}}</td>
                        <td >{{$history[$i]-> seller_name}}</td>
                        <td >{{$history[$i]-> category_name}}</td>
                        <td >{{$history[$i]-> contact}}</td>
                        <td >{{$history[$i]-> amount}}</td>
                           @endfor
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount Due 2/22/2014</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>$250.30</td>
                      </tr>
                      <tr>
                        <th>Tax (9.3%)</th>
                        <td>$10.34</td>
                      </tr>
                      <tr>
                        <th>Shipping:</th>
                        <td>$5.80</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>$265.24</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
</body>
</html>
