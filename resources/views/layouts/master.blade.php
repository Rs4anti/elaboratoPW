<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0, 
              user-scalable=no">

        <!-- Fogli di stile -->
        <link rel="stylesheet" href="{{ url('/') }}/css/bootstrap.min.css">
        <link href="{{ url('/') }}/css/style.css" rel="stylesheet">

        <!-- Plugin JavaScript  -->
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="{{url('/')}}/js/bootstrap.min.js"></script>

        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    </head>

    <body>

      <nav class="navbar navbar-expand-lg bg-transparent">
        <div class="container container-fluid">
          <a class="navbar-brand" href="#">qua logo</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Rassegne
                </a>
                    <ul class="dropdown-menu">       
                        <li><a class="dropdown-item" href="#">Garden Multivision</a></li>
                                                      
                        <li><a class="dropdown-item" href="#">Iride</a></li>
                    </ul>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="prices/prices.html"> Prezzi</a>
              </li>

                <li class="nav-item">
                    <a class="nav-link" href="#" role="button">Contatti</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#" role="button">LOGIN</a>
                </li>

            </li>
            </ul>
          </div>
        </div>
        </div>
      </nav>

      <div class="container-fluid">
            @yield('body')
        </div>

        
    </body>

</html>