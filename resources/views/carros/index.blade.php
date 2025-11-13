@extends('template_carro.cars')
@section('conteudo')

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <a href="{{ route('home') }}" class="btn btn-primary" style="padding: 12px 30px; font-size: 16px;">
                    ← Voltar para Home
                </a>
            </div>
        </div>
    </div>
</section>

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
@endsection