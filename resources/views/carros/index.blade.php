@extends('template_carro.cars')
@section('conteudo')
<div class="site-section bg-light">
      <div class="container">
        <div class="row">
          @foreach($carros as $carro)
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="item-1">
                <a href="#"><img src="" alt="Image" class="img-fluid"></a>  <!-- Colocar a imagem -->
                <div class="item-1-contents">
                  <div class="text-center">
                  <h3><a href="#">{{ $carro->modelo }}</a></h3>
                  <div class="rating">
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                  </div>
                  <div class="rent-price"><span>R$ {{ number_format($carro->valor, 2, ',', '.') }}</span></div>
                  </div>
                  <ul class="specs">
                    <li>
                      <span>Ano</span>
                      <span class="spec">{{ $carro->ano_fabricacao }}</span>
                    </li>
                    <li>
                      <span>Quilometragem</span>
                      <span class="spec">{{ number_format($carro->quilometragem, 0, ',', '.') }} km</span>
                    </li>
                  </ul>
                  <div class="d-flex action">
                    <a href="contact.html" class="btn btn-primary">Ver Detalhes</a>
                  </div>
                </div>
              </div>
          </div>          
          @endforeach    
        </div>
      </div>
    </div>
@endsection