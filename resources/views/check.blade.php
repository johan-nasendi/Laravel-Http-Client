<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <title>Check Resutlf</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
          font-size: 1.125rem;
          text-anchor: middle;
          -webkit-user-select: none;
          -moz-user-select: none;
          -ms-user-select: none;
          user-select: none;
        }

        @media (min-width: 768px) {
          .bd-placeholder-img-lg {
            font-size: 3.5rem;
          }
        }
      </style>

  </head>
  <body class="bg-white">
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal">My Apps</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a href="#" class="p-2 text-dark">Home</a>
            <a href="#" class="p-2 text-dark">About</a>
            <a href="#" class="p-2 text-dark">Service</a>
            <a href="#" class="p-2 text-dark">Log In</a>
        </nav>
        <a href="https://www.instagram.com/johan.nasendi/" class="btn btn-outline-info" target="_blank">J.Nasendi</a>
    </div>
    <div class="container">
        <div class="py-5 text-center">
            <h2>Crazy Package</h2>
            <p class="lead">Lorem ipsum dolor sit amet.</p>
        </div>

        <div class="row">
            <div class="col-md-12 order-md-2 mb-4">
                <div class="card">
                    @if ($check)
                    <div class="card-body">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Results found</span>
                            <a href="{{route('create.form')}}"><span class="badge badge-danger badge-pill"> X </span></a>
                          </h4>
                          @foreach ($check as $h )
                          <ul class="list-group mb-3">
                             <li class="list-group-item d-flex justify-content-between lh-condensed">
                               <div>
                                 <h6 class="my-0">Service</h6>
                                 <small class="text-muted">{{$h['service']}}</small>
                               </div>
                             </li>
                             <li class="list-group-item d-flex justify-content-between lh-condensed">
                               <div>
                                 <h6 class="my-0">Description</h6>
                                 <small class="text-muted"> {{$h['description']}} </small>
                               </div>
                             </li>
                             <li class="list-group-item d-flex justify-content-between lh-condensed">
                               <div>
                                 <h6 class="my-0">Cost</h6>
                                 <small class="text-muted">  </small>
                               </div>
                               <span class="text-muted">Fee : {{$h['cost'][0]['value']}}</span>
                               <span class="text-muted">Etd :{{$h['cost'][0]['etd']}}</span>
                               <span class="text-muted"> Note : {{$h['cost'][0]['note']}}</span>
                             </li>
                             <li class="list-group-item d-flex justify-content-between">
                               <span>Total (IDR)</span>
                               <strong>Rp.20</strong>
                             </li>
                           </ul>
                          @endforeach


                        </div>
                    </div>
                    @else
                   <div class="card-body">
                        <h4 class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-danger"> Not Found.... </span>
                            <a href="{{route('create.form')}}"><span class="badge badge-danger badge-pill"> X </span></a>
                        </h4>
                        <p class="text-muted"> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloremque, fugit!</p>
                   </div>
                    @endif

                </div>


        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

  </body>
</html>
