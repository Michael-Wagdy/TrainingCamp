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

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="/home">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/home">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('user.cart')}}">My Cart</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="user/logout">Logout</a>
            </li>
           <li class="nav-item">
              <a class="nav-link" href="login">Login</a>
            </li>
          </ul>

        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">
          <h1>

          </h1>
          <h1 class="my-4">Shop Name</h1>
          <div class="list-group">
              @foreach($categories as $category)
              <ul style="list-style:none;">
                  <li>
                  <label><input type="checkbox" name="categories[]" value="{{ $category->id }}" data-parent="{{$category->id}}" >{{$category->name}} </label>
                      @if(count($category->childs))
                          @foreach($category->childs as $child)
                      <ul style="list-style:none;">
                          <li>
                          <label> <input type="checkbox" name="categories[]" value="{{ $child->id }}" data-child="{{$category->id}}" > {{$child->name}} </label>
                          </li>
                      </ul>
                          @endforeach
                      @endif
                    </li>
                </ul>
              @endforeach
              
            
          </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
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

          
          <div id="search-results"></div>

          <div class="row" id="offer">
            @foreach($offers as $offer)
            <div class="col-lg-4 col-md-6 mb-4 " id="offer">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">{{ $offer->name }}</a>
                  </h4>
                  <h5>{{$offer->user_price}}</h5>
                  <p class="card-text">{{ $offer->id }}</p>
                  @if(in_array($offer->toArray(),Auth::user()->offers->toArray()))
                    <button class="btn btn-success add" data-text-swap="Remove" value="{{ $offer->id }}">Remove</button>
                  @else
                  <button class="btn btn-success add" data-text-swap="Remove" value="{{ $offer->id }}">Add to Cart</button>
                  @endif
                  <!--<button class="btn btn-danger remove" style="display:none;">Remove from Cart</button> -->
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          {{$offers->links()}}
          
        
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('js/jquery-1.12.0.min.js')}}"></script>
    <script>
      $(document).ready(function () 
      {
        $.ajaxSetup({
          headers: 
          {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        
          var carts = [];
          
          $("button").on("click", function() {

            var el = $(this);

            if (el.text() == el.data("text-swap")) {

              el.text(el.data("text-original"));

              carts.pop($(this).val());
              
            }
            else 
            {
                el.data("text-original", el.text());

                el.text(el.data("text-swap"));

                if(carts.length < 3)
                {
                  carts.push($(this).val());
                }else
                {
                  alert("Keda kfaya 3lek el offers dol ya handsa !!");
                }
            }
            $.ajax({
            type: "POST",
            dataType: "json",
            url: '{{ route('usersoffers') }}',
            data: {'carts': carts},
            success:function(data) {
              console.log("Done");
            }
          });
          });

        var categories = [];


        $('input[name="categories[]"][data-parent]').on('change', function () 
        {

          if($(this).data('parent') > 0 && $(this).prop('checked') == true){
            
            var parentid = $(this).data('parent');
            $('[data-child="'+parentid+'"]').prop("checked",true);
            console.log(parentid);

          }
          if($(this).data('parent') > 0 && $(this).prop('checked') == false){
            var parentid = $(this).data('parent');
            $('[data-child="'+parentid+'"]').prop("checked",false);
            console.log(parentid);}
         
          addData();
          sendData(categories);});

        $('input[name="categories[]"]').on('change', function () 
        { addData();
         sendData(categories);
        });

      function addData(){
        categories = [];

$('input[name="categories[]"]:checked').each(function()
{
  categories.push($(this).val());
});
      }

      function sendData(categories){
        console.log(categories);
        $.ajax({
            type: "POST",
            dataType: "json",
            url: '{{ route('checkboxcategories') }}',
            data: {'categories': categories},
            success:function(data) {
              $("#offer").html("");
              $.each(data , function(index , element) {
                $("#offer").append(`<div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">`+element.name+`</a>
                  </h4>
                  <h5>`+element.user_price+'$'+`</h5>
                  <p class="card-text">`+element.start_date+`</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
              </div>`);
            });
              console.log(data);
            }
          });
      }
    });

    </script>

  </body>

</html>
