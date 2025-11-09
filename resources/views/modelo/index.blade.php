@extends('template_dashboard.index')
@section('conteudo')
    <table class='table table-striped table-bordered table-hover w-100 text-center align-middle'>
        <thead class="table-dark text-white">
            <tr>
                <td>id</td>
                <td>Marca</td>
                <td>Modelo</td>                            
                <td><a href="{{ route('modelo.cadastrar') }}" class="btn btn-primary">Incluir ➕</a></td>
            </tr>
        </thead>
        <tbody>
        @foreach($modelo as $linha)
        <tr>        
                <td>{{ $linha->id }}</td>
                <td>{{ $linha->marca->marca_nome }}</td>
                <td>{{ $linha->modelo }}</td>
                <td><a href="{{ route('modelo.buscar', $linha->id) }}" class="btn btn-primary">✏️</a> 
                    <a href="{{ route('modelo.deletar', $linha->id) }}" class="btn btn-danger">🗑️</a>
                </td>           
        </tr>
        @endforeach
    </tbody>
</table>




@endsection