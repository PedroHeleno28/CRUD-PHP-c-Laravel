@extends('template_carro.cars')

@section('conteudo')

<div class="container py-5">    
    <h2 class="mb-4">{{ $carro->modelo->modelo }}</h2>    
    <div class="row">
        
        <div class="col-md-7 mb-4">
            <img src="{{ $carro->foto1 }}" class="img-fluid rounded shadow-sm" alt="Foto principal">
        </div>
        
        <div class="col-md-5">
            <div class="col-md-2">
                <form method="GET" action="{{ route('carros') }}" class="text-end">
                <button type="submit" class="btn btn-primary">Voltar</button>
                </form>
            </div>            
            <div class="p-4 bg-white shadow-sm rounded">

                <h3 class="text-primary">R$ {{ number_format($carro->preco, 2, ',', '.') }}</h3>                
                <ul class="list-group list-group-flush mt-3">
                    <li class="list-group-item">
                        <strong>Ano: </strong> {{ $carro->ano_fabricacao }}
                    </li>
                    <li class="list-group-item">
                        <strong>Quilometragem: </strong> {{ number_format($carro->km, 0, ',', '.') }} km
                    </li>
                    <li class="list-group-item">
                        <strong>Modelo: </strong> {{ $carro->modelo->modelo }}
                    </li>
                    <li class="list-group-item">
                        <strong>Cor: </strong> {{ $carro->cor->cor }}
                    </li>
                    <li class="list-group-item">
                        <strong>Detalhes: </strong> {{ $carro->detalhes }}
                    </li>                    
                </ul>
            </div>
        </div>
    </div>
    
    <h4 class="mt-5">Mais fotos</h4>
    <div class="row">        
        <div class="col-md-4 mb-4">
            <img src="{{ $carro->foto2 }}" class="img-fluid rounded shadow-sm">
        </div>        
        <div class="col-md-4 mb-4">
            <img src="{{ $carro->foto3 }}" class="img-fluid rounded shadow-sm">
        </div>                       
    </div>

</div>

@endsection