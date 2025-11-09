@extends('template_dashboard.index')
@section('conteudo')    
    <table class='table table-striped table-bordered table-hover w-100 text-center align-middle'>
        <thead class="table-dark text-white">
            <tr>
                <td>Id</td>                
                <td>Cor</td>                            
                <td><a href="{{ route('cor.cadastrar') }}" class="btn btn-primary">Incluir ➕</a></td>
            </tr>
        </thead>
        <tbody>
        @foreach($cor as $linha)
        <tr>        
                <td>{{ $linha->id }}</td>                
                <td>{{ $linha->cor }}</td>                
                <td><a href="{{ route('cor.buscar', $linha->id) }}" class="btn btn-primary">✏️</a> 
                    <a href="{{ route('cor.deletar', $linha->id) }}" class="btn btn-danger">🗑️</a>
                </td>                           
        </tr>
        @endforeach
    </tbody>
</table>


@endsection