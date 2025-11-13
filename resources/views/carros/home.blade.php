@extends('template_carro.cars')
@section('conteudo')

<h3 class="mb-4">Marcas</h3>

<div class="marcas-container">
    @foreach($marcas as $marca)
        <div class="marca-item">
            <img src="{{ $marca->logo }}" alt="{{ $marca->marca_nome }}">
        </div>
    @endforeach
</div>

<div class="site-section bg-light">  
  <div class="container">
    <div class="row">

      @foreach($modelos as $modelo)
      <div class="col-lg-4 col-md-6 mb-4">
        
        <div class="card-modelo">

          <div class="img-box">
            <img src="{{ $modelo->foto }}" alt="{{ $modelo->modelo }}">
          </div>

          <h4 class="mb-2">{{ $modelo->modelo }}</h4>

          <a href="{{ route('carros') }}" class="btn btn-primary">Ver modelos</a>

        </div>

      </div>
      @endforeach

    </div>
  </div>
</div>

@endsection