<!doctype html>
<html lang="en">
  <head>
    <title> Add to Cart</title>
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" >
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" ></script>


    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6/dist/jquery.min.js"></script> -->


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script> -->

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    Include Font Awesome CSS
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> -->
</head>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
<
       
   
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css1/card2.css') }}">
   
  
   
    <!-- <link href="{{ asset('css/styles.css') }}" rel="stylesheet"> -->
</head>
    
  
    

  <body>

  <div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 mx-auto">
        <!-- <div class="col-lg-12 col-sm-12 col-12"> -->
            <div class="dropdown">
                <button type="button" class="btn btn-primary" data-toggle="dropdown">
                 
                <!-- <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span> -->

                <a href="{{ route('cart') }}"  class="btn btn-primary btn-block"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span></a>
            </button>

                <div class="dropdown-menu">
                    <div class="row total-header-section">
                        @php $total = 0 @endphp
                        @foreach((array) session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                        @endforeach
                        <!-- <div class="col-lg-12 col-sm-12 col-12 total-section text-right"> -->
                             <div class="col-lg-12 col-md-12 mx-auto total-section text-right">
                            <p>Total: <span class="text-info">KES{{ $total }}</span></p>
                        </div>
                    </div>
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            <div class="row cart-detail">
                                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                    <img src="{{ asset('image2') }}/{{ $details['image'] }}" />
                                </div>
                                <div class="col-lg-12 col-md-12 mx-auto cart-detail-product">
                                    <p>{{ $details['menu_name'] }}</p>
                                    <span class="price text-info"> KES{{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <!-- <div class="col-lg-12 col-sm-12 col-12 text-center checkout"> -->
                    <div class="col-lg-12 col-md-12 mx-auto text-center checkout">

                            <a href="{{ route('cart') }}" class="btn btn-primary btn-block">View all</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<br/>
<div class="container">
   
    @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div> 
    @endif


@yield('content')


</div>

@yield('scripts')
  </body>
</html>