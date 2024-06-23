@extends('layouts.master')

@section('title','Multisale Garden Iride')

@section('body')
          <div class="row text-center">
              <h2>
                Scegli il cinema
              </h2>
          </div>

            <div class="row" >
              <div class="col-md-6 col-sm-12 order-md-1 mt-2 mb-2">
                <div class="card border-dark w-100 h-100">
                  <div class="card-header text-center">
                    <a class="btn btn-primary" href="{{route('gardenProgrammazione.index')}}"> 
                    <i class="bi bi-film"></i> 
                    Vedi programmazione Garden-Multivision</a>
                  </div>
                      <div class="card-body">
                          <a href="{{route('gardenProgrammazione.index')}}">
                          <img src="img/Loghi/logoGarden-removebg-preview.png" class="img-fluid" alt="...">
                        </a>
                                   
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-sm-12 order-md-1 mt-2 mb-2">
                  <div class="card border-dark w-100 h-100">
                    <div class="card-header text-center">
                      <a class="btn btn-primary" href="{{route('irideProgrammazione.index')}}">
                      <i class="bi bi-film"></i>
                      Vedi programmazione Iride-Vega</a>
                    </div>
                        <div class="card-body d-flex justify-content-center align-items-center">
                          <a href="{{route('irideProgrammazione.index')}}">
                            <img src="img/Loghi/logoIride-removebg-preview.png" class="img-fluid" alt="...">
                          </a>      
                      </div>
                  </div>
                </div>
              </div>
          </div>
      </div>
@endsection