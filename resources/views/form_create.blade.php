<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <title>Test Http CLient</title>
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
            <a href="/" class="p-2 text-dark">Home</a>
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
            <div class="col-md-10 offset-2 order-md-1">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('post.api')}}" method="get" class="needs-validation" novalidate >
                            @csrf

                            <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="firstName">Full Name</label>
                                <input type="text" class="form-control" name="name" placeholder="example:John Doe"  required>
                                <div class="invalid-feedback">
                                     Valid Full name is required.
                                </div>
                            </div>
                            </div>

                            <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">Send Form</label>
                                <select class="custom-select d-block w-100" name="province_from" required>
                                    <option value="">Choose Province...</option>
                                    @foreach ($provinces as $pf )
                                    <option value="{{$pf->id}}"> {{$pf->province}} </option>
                                    @endforeach
                                </select>
                                <br>
                                <select class="custom-select d-block w-100" name="origin" required>
                                    <option value="" holder >Choose City...</option>
                                </select>
                                <div class="invalid-feedback">
                                    Valid Send Form is required.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="firstName">Send To</label>
                                <select class="custom-select d-block w-100" name="province_to" required>
                                    <option value="">Choose Province...</option>
                                    @foreach ($provinces as $po )
                                    <option value="{{$po->id}}"> {{$po->province}} </option>
                                    @endforeach
                                </select>
                                <br>
                                    <select class="custom-select d-block w-100" name="destination" required>
                                        <option value="">Choose City...</option>
                                    </select>
                                <div class="invalid-feedback">
                                Valid Send To is required.
                                </div>
                            </div>
                            </div>

                            <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">Package Weight</label>
                                <input type="text" class="form-control" name="weight" placeholder="example: 114"  required>
                                <div class="invalid-feedback">
                                Valid Package Weight is required.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="firstName">Courier</label>
                                <select class="custom-select d-block w-100" name="courier" required>
                                    <option value="" holder>Choose...</option>
                                    <option value="jne">JNE</option>
                                    <option value="tiki">TIKI</option>
                                    <option value="pos">Pos Indonesia</option>
                                </select>
                                <div class="invalid-feedback">
                                     Valid Courier is required.
                                </div>
                            </div>
                            </div>

                            <hr class="mb-4">
                            <button class="btn btn-outline-success btn-lg btn-block" type="submit">Postage Check</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('select[name="province_from"]').on('change', function () {
                var cityId = $(this).val();
                if (cityId) {
                    $.ajax({
                        url: 'getCity/ajax/' + cityId,
                        type: "GET",
                        dataType : "json",
                        success: function (data) {
                            $('select[name="origin"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="origin"]').append(
                                '<option value="' + key + '">' + value + '</option>');
                            })
                        }
                    });
                }
                else {
                    $('select[name="origin"]').empty();
                }
            });

            $('select[name="province_to"]').on('change', function () {
                var cityId = $(this).val();
                if (cityId) {
                    $.ajax({
                        url: 'getCity/ajax/' + cityId,
                        type: "GET",
                        dataType : "json",
                        success: function (data) {
                            $('select[name="destination"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="destination"]').append(
                                '<option value="' + key + '">' + value + '</option>');
                            })
                        }
                    });
                }
                else {
                    $('select[name="destination"]').empty();
                }
            });


        })
    </script>
  </body>
</html>
