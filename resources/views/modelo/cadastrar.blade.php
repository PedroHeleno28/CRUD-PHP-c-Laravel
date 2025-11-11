@extends('template_dashboard.index')
@section('conteudo')
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <style>

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    input[type=number] {
      -moz-appearance: textfield;
    }

    .form-wrapper {
    max-width: 800px;          
    margin: 0 auto;            
    background: #fff;          
    padding: 2rem;             
    border-radius: 8px;        
    box-shadow: 0 0.5rem 1rem rgba(0,0,0,.05);  
  }
  </style>

@if(session("sucess"))
       <div class="alert alert-success" role="alert">
            {{ session("sucess") }}            
        </div> 
    @endif
    @if ($errors->any())
        <h3>Erro</h3>
        @foreach($errors->all() as $erro)        
        <div class="alert alert-danger" role="alert">
            {{ $erro }}            
        </div>
        @endforeach
    @endif

  <div class="form-wrapper">
    <h1 class="text-center">Cadastro de Modelos</h1>
    <form action="{{ route('modelo.salvar') }}" method="POST">      
      @csrf
      <div class="form-group">        
        <label>Marca:</label>
        <select name="marca_id" class="form-control" required>
        @foreach($marca as $linha)
          <option value="{{ $linha->id }}">{{ $linha->marca_nome }}</option>
        @endforeach          
        </select>
      </div>
      <div class="form-group">
        <label>Modelo:</label>
        <input type="text" name="modelo" class="form-control"
        placeholder="" required>
      </div>
      <div class="form-group">
        <label>Foto:</label>
        <input type="text" name="foto" class="form-control"
        placeholder="link da foto" required>
      </div>
      <div class="d-flex justify-content-between">
        <a href="{{ route('modelos') }}" class="btn btn-secondary">Voltar</a>
        <input type="submit" value="Cadastrar" class="btn btn-primary">
      </div>
    </form>
  </div>
@endsection