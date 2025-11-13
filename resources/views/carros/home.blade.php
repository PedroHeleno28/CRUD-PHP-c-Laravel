@extends('template_carro.cars')
@section('conteudo')    

<section class="ftco-section">
    <div class="container">
        <form action="{{ route('home.search') }}" method="GET" class="mb-4">
            <div class="row g-2 justify-content-center">
                <div class="col-md-6">
                    <input type="text" name="modelo" class="form-control" 
                           placeholder="Digite o modelo do carro (ex: Golf, Uno...)" 
                           value="{{ request('modelo') }}" 
                           style="padding: 12px; font-size: 16px; border: 1px solid #ddd; border-radius: 4px; position: relative; z-index: 10;">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100" style="padding: 12px; font-size: 16px;">
                        Buscar
                    </button>
                </div>
                <!--<div class="col-md-2">
                    <a href="{{ route('home') }}" class="btn btn-secondary w-100" style="padding: 12px; font-size: 16px; text-decoration: none;">
                        Limpar
                    </a>
                </div>-->
            </div>
        </form>
    </div>
</section>


<div class="centralizar-pesquisa">
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

        </div>

      </div>
      @endforeach

    </div>
  </div>
</div>

@endsection