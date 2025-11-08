<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Cadastrar Modelos</title>
  <link rel="icon" type="image/png" href="/images/title.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <style>
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
      box-shadow: 0px 0px 12px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>
  <div class="container-form">
    <h1 class="text-center">Cadastro de Modelos</h1>
    <form action="{{ route('modelo.alterar') }}" method="POST">      
        @csrf
      <div class="form-group">
        <label>Marca:</label>
        <select name="marca_id" class="form-control">        
        @foreach($marca as $linha)          
          <option value="{{ $linha->id }}"
                    {{ $linha->id == $modelo->marca_id ? 'selected' : '' }}>
                    {{ $linha->marca_nome }}
                </option>
        @endforeach        
        </select>
      </div>
      <div class="form-group">
        <input type="hidden" name="id" value="{{ $modelo->id }}">
        <label>Modelo:</label>
        <input type="text" name="modelo" class="form-control" value="{{ $modelo->modelo }}"
         required>
      </div>
      <div class="d-flex justify-content-between">
        <a href="{{ route('modelos') }}" class="btn btn-secondary">Voltar</a>
        <input type="submit" value="Cadastrar" class="btn btn-primary">
      </div>
    </form>
  </div>
</body>
</html>