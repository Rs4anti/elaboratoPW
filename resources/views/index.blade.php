@extends('layouts.master')

@section('title','Multisale Garden Iride')

@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page">Home</li>
@endsection


@section('body')
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
@endsection