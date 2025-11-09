<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Incluir</title>
  <link rel="icon" type="image/png" href="/images/title.png">
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

    body {
      background-color: #f8f9fa;
      padding: 40px;
    }
    .container-form {
      max-width: 600px;
      margin: 0 auto;
      background: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 0 12px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>

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

    <div class="container-form">
        <h1 class="text-center">Cadastro de Veículos</h1>
        <form method="POST" action="{{ route('carros.alterar')}}">              
            @csrf
            <div class="form-group">
                <input type="hidden" name="id" value="{{ $carro->id }}">
                <label>Marca</label>
                <select name="marca_id" class="form-control" required>
                  <option value="">Selecione a marca</option>
                  @foreach($marca as $linha)
                  <option value="{{ $linha->id }}" {{ $linha->id == $carro->marca_id ? 'selected' : '' }}>
                    {{ $linha->marca_nome }}
                  </option>
                  @endforeach
                </select>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Modelo</label>
                    <select name="modelo_id" class="form-control" required>
                      <option value="">Selecione o modelo</option>
                      @foreach($modelo as $linha)
                      <option value="{{ $linha->id }}" {{ $linha->id == $carro->modelo_id ? 'selected' : '' }}>
                      {{ $linha->modelo }}
                      </option>
                      @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Cor</label>
                    <select name="cor_id" class="form-control" required>
                      <option value="">Selecione a cor</option>
                      @foreach($cor as $linha)
                      <option value="{{ $linha->id }}" {{ $linha->id == $carro->cor_id ? 'selected' : '' }}>
                        {{ $linha->cor }}
                      </option>
                      @endforeach
                    </select>
                </div>        
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Preço:</label>
                    <input type="number" name="preco" class="form-control"
                     step="0.01" placeholder="0.00" value="{{ $carro->preco}}">
                </div>
                <div class="form-group col-md-4">
                    <label>Quilômetragem:</label>
                    <input type="number" name="km" class="form-control"
                     placeholder="0.00" value="{{ $carro->km}}">
                </div>
                <div class="form-group col-md-4">
                    <label>Ano:</label>
                    <input type="text" name="ano_fabricacao" class="form-control"
                     placeholder="2025/2026" value="{{ $carro->ano_fabricacao}}">
                </div>
            </div>
            <div class="form-group">
                <label>Detalhes</label>
                <input type="text" name="detalhes" class="form-control" 
                 placeholder="Ar condicionado, Câmera de ré" value="{{ $carro->detalhes}}">
            </div>
             <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Foto 1:</label>
                    <input type="text" name="foto1" class="form-control"
                     placeholder="Link Foto 1" value="{{ $carro->foto1}}">
                </div>
                <div class="form-group col-md-4">
                    <label>Foto 2:</label>
                    <input type="text" name="foto2" class="form-control"
                     placeholder="Link Foto 2" value="{{ $carro->foto2}}">
                </div>
                <div class="form-group col-md-4">
                    <label>Foto 3:</label>
                    <input type="text" name="foto3" class="form-control"
                     placeholder="Link Foto 3" value="{{ $carro->foto3}}">
                </div>
            </div>                                
            <div class="d-flex justify-content-between">
                <a href="{{ route('carros.inicio') }}" class="btn btn-secondary">Voltar</a>
                <input type="submit" value="Cadastrar" class="btn btn-primary">
            </div>          
        </form>
    </div>
</body>
</html>