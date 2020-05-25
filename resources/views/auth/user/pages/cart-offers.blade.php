<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Shop Homepage - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/shop-homepage.css')}}" rel="stylesheet">

  </head>
  <body>
      

  
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-9">
            <div class="row" id="offer">


                @foreach ($user->offers as $offer)
                @foreach($offer->images as $image)
                <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <a href="#"><img class="card-img-top" src="/uploads/images/{{ $image->imagename }}" alt=""></a>
                    <div class="card-body">
                    <h4 class="card-title">
                        <a href="#">{{ $offer->name }}</a>
                    </h4>
                    <h5>$24.99</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                    </div>
                    <div class="card-footer">
                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                    </div>
                </div>
                </div>
                @endforeach
                @endforeach

            </div>
        </div>
<!-- /.col-lg-9 -->
    </div>
<!-- /.row -->
</div>
<!-- /.container -->
</body>