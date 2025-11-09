@extends('template_dashboard.index')
@section('conteudo')
    <table class='table table-striped table-bordered table-hover w-100 text-center align-middle'>
        <thead class="table-dark text-white">
            <tr>
                <td>id</td>
                <td>Marca</td>
                <td>Modelo</td>                            
                <td>Cor</td>                            
                <td>Km</td>                            
                <td>Ano</td>                                            
                <td><a href="{{ route('carros.cadastrar') }}" class="btn btn-primary">Incluir ➕</a></td>
            </tr>
        </thead>
        <tbody>
        @foreach($carros as $linha)
        <tr>        
                <td>{{ $linha->id }}</td>
                <td>{{ $linha->marca->marca_nome }}</td>
                <td>{{ $linha->modelo->modelo }}</td>
                <td>{{ $linha->cor->cor }}</td>
                <td>{{ $linha->km }}</td>
                <td>{{ $linha->ano_fabricacao }}</td>
                <td><a href="{{ route('carro.buscar', $linha->id) }}" class="btn btn-primary">✏️</a> 
                    <a href="{{ route('carro.deletar', $linha->id) }}"  class="btn btn-danger">🗑️</a>
                </td>           
        </tr>
        @endforeach
    </tbody>
</table>




@endsection