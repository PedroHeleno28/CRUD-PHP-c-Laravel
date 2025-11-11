@extends('template_dashboard.index')
@section('conteudo')    
    <table class='table table-striped table-bordered table-hover w-100 text-center align-middle'>
        <thead class="table-dark text-white">
            <tr>
                <td>Id</td>                
                <td>Marca</td>                
                <td>Logo</td>                
                <td><a href="{{ route('marcas.cadastrar') }}" class="btn btn-primary">Incluir ➕</a></td>
            </tr>
        </thead>
        <tbody>
        @foreach($marca as $linha)
        <tr>        
                <td>{{ $linha->id }}</td>                
                <td>{{ $linha->marca_nome }}</td>                
                <td><img src="{{ $linha->logo }}" class="img-produto" alt="{{ $linha->marca_nome }}"
                         style="max-width: 80px; height: auto; object-fit: contain;"></td>
                <td><a href="{{ route('marcas.buscar', $linha->id) }}" class="btn btn-primary">✏️</a> 
                    <a href="{{ route('marcas.deletar', $linha->id) }}" class="btn btn-danger">🗑️</a>
                </td>                           
        </tr>
        @endforeach
    </tbody>
</table>


@endsection