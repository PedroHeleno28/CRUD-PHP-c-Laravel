@extends('template_carro.cars')
@section('conteudo')


<div class="container my-4">
  <form method="GET" action="{{ route('carros') }}" class="row justify-content-center">
    <div class="col-md-6">
      <input 
        type="text" 
        name="modelo" 
        class="form-control" 
        placeholder="🔍 Pesquisar por modelo..."
        value="{{ request('modelo') }}">
    </div>
    <div class="col-md-2">
      <button type="submit" class="btn btn-primary btn-block">Buscar</button>
    </div>
  </form>
</div>

<div class="site-section bg-light">  
    <div class="container">
        <div class="row">
            @foreach($carros as $carro)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card-carro">
                    <div class="img-box">
                        <img src="{{ $carro->foto1 }}" alt="{{ $carro->modelo->modelo }}">
                    </div>
                    <div class="card-carro-body">
                        <h3>{{ $carro->modelo->modelo }}</h3>
                        <div class="rent-price">
                            R$ {{ number_format($carro->preco, 2, ',', '.') }}
                        </div>
                        <ul class="specs">
                            <li>
                                <span>Ano</span>
                                <span>{{ $carro->ano_fabricacao }}</span>
                            </li>
                            <li>
                                <span>Quilometragem</span>
                                <span>{{ number_format($carro->km, 0, ',', '.') }} km</span>
                            </li>
                        </ul>
                        <div class="card-carro-footer">
                            <a href="{{ route('carros.detalhes', $carro->id) }}" class="btn btn-primary">
                                Ver Detalhes
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!--<div class="site-section bg-light">  
      <div class="container">
        <div class="row">
          @foreach($carros as $carro)
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="item-1">
                <a href="#"><img src="{{ $carro->foto1 }}" alt="Image" class="img-fluid"></a>
                <div class="item-1-contents">
                  <div class="text-center">
                  <h3><a href="#">{{ $carro->modelo->modelo }}</a></h3>
                  <div class="rating">                    
                  </div>
                  <div class="rent-price"><span>R$ {{ number_format($carro->preco, 2, ',', '.') }}</span></div>
                  </div>
                  <ul class="specs">
                    <li>
                      <span>Ano</span>
                      <span class="spec">{{ $carro->ano_fabricacao }}</span>
                    </li>
                    <li>
                      <span>Quilometragem</span>
                      <span class="spec">{{ number_format($carro->km, 0, ',', '.') }} km</span>
                    </li>
                  </ul>
                  <div class="d-flex action">
                    <a href="{{ route('carros.detalhes', $carro->id) }}" class="btn btn-primary">Ver Detalhes</a>
                  </div>
                </div>
              </div>
          </div>          
          @endforeach    
        </div>
      </div>
    </div>-->
@endsection