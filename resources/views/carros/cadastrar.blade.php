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
        <h1 class="text-center">Cadastro de Veículos</h1>
        <form method="POST" action="{{ route('carros.gravar')}}">              
          @csrf
            <div class="form-group">
              <label>Marca</label>
              <select name="marca_id" class="form-control" required>
                <option value="">Clique para selecionar a marca</option>
                @foreach($marca as $marca)
                <option value="{{ $marca->id }}">{{ $marca->marca_nome }}</option>                
                @endforeach
              </select>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Modelo</label>
                    <select name="modelo_id" class="form-control" required>
                      <option value="">Clique para selecionar o modelo</option>
                      @foreach($modelos as $modelo)
                      <option value="{{ $modelo->id }}">{{ $modelo->modelo }}</option>
                      @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Cor</label>
                    <select name="cor_id" class="form-control" required>
                      <option value="">Clique para selecionar a cor</option>
                      @foreach($cor as $cor)
                      <option value="{{ $cor->id }}">{{ $cor->cor }}</option>
                      @endforeach
                    </select>
                </div>        
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Preço:</label>
                    <input type="number" name="preco" class="form-control"
                     step="0.01" placeholder="0.00" required value="{{ old('preco') }}">
                </div>
                <div class="form-group col-md-4">
                    <label>Quilômetragem:</label>
                    <input type="number" name="km" class="form-control"
                     placeholder="0.00" required value="{{ old('km') }}">
                </div>
                <div class="form-group col-md-4">
                    <label>Ano:</label>
                    <input type="tex" name="ano_fabricacao" class="form-control"
                     placeholder="2025/2026" required value="{{ old('ano_fabricacao') }}">
                </div>
            </div>
            <div class="form-group">
                <label>Detalhes</label>
                <input type="text" name="detalhes" class="form-control" 
                 placeholder="Ar condicionado, Câmera de ré" value="{{ old('detalhes') }}">
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Foto 1:</label>
                    <input type="text" name="foto1" class="form-control"
                     placeholder="Link Foto 1" value="{{ old('foto1') }}">
                </div>
                <div class="form-group col-md-4">
                    <label>Foto 2:</label>
                    <input type="text" name="foto2" class="form-control"
                     placeholder="Link Foto 2" value="{{ old('foto2') }}">
                </div>
                <div class="form-group col-md-4">
                    <label>Foto 3:</label>
                    <input type="text" name="foto3" class="form-control"
                     placeholder="Link Foto 3" value="{{ old('foto3') }}">
                </div>
          </div>                                
            <div class="d-flex justify-content-between">
                <a href="{{ route('carros.inicio') }}" class="btn btn-secondary">Voltar</a>
                <input type="submit" value="Cadastrar" class="btn btn-primary">
            </div>          
        </form>
    </div>
@endsection