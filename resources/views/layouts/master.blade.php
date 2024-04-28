<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0, 
              user-scalable=no">

        <!-- Styles --> <!--genera un URL completo che punta al file CSS nel progetto Laravel-->
        <link rel="stylesheet" href="{{ url('/') }}/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{url('/')}}css/style.css">

        <!-- Plugin JavaScript  -->
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="{{url('/')}}/js/bootstrap.min.js"></script>
    </head>

    <body>

      <nav class="navbar navbar-expand-lg bg-transparent">
        <div class="container container-fluid">
          <a class="navbar-brand" href="#">brandLogo</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Rassegne
                </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Cinema 1</a></li>
                        <li><a class="dropdown-item" href="#">Cinema 2</a></li>
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


    <div class="container container-fluid">
          <!--
          <div class="row" style="height: 20vh;">
            <div class="col">
              <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="/img/Loghi/logoCinema.png" class="img-fluid" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="https://via.placeholder.com/1920x1080" class="d-block w-100" alt="...">
                  </div>
                  <!-- Aggiungi altre immagini del carousel come necessario 
                </div>
                <!-- Frecce di navigazione 
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            </div>
          </div>
        -->
        
          <div class="row">
              <div class="header-home text-center">
                <h1>
                  PROGRAMMAZIONE
                </h1>
              </div>
          </div>

          <div class="row text-center">
              <h2>
                Scegli il cinema
              </h2>
          </div>

            <div class="row" >
              <div class="col-md-6 col-sm-12 order-md-1 mt-2 mb-2">
                <div class="card border-dark w-100 h-100">
                  <div class="card-header text-center">
                    <a class="btn btn-primary" href="#"> Vedi programmazione Garden-Multivision</a>
                  </div>
                      <div class="card-body">
                          <a href="#progrGarden">
                          <img src="img/Loghi/logoGarden-removebg-preview.png" class="img-fluid" alt="...">
                        </a>
                                   
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-sm-12 order-md-1 mt-2 mb-2">
                  <div class="card border-dark w-100 h-100">
                    <div class="card-header text-center">
                      <a class="btn btn-primary" href="#"> Vedi programmazione Iride-Vega</a>
                    </div>
                        <div class="card-body d-flex justify-content-center align-items-center">
                          <a href="#progrIride">
                            <img src="img/Loghi/logoIride-removebg-preview.png" class="img-fluid" alt="...">
                          </a>      
                      </div>
                  </div>
                </div>
              </div>
          </div>
      </div>

        
    </body>

</html>