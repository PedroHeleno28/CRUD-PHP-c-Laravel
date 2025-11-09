<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Cadastrar Marcas</title>
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
    <h1 class="text-center">Alteração de Marcas</h1>
    <form action="{{ route('marcas.alterar') }}" method="POST">      
        @csrf        
      <div class="form-group">
        <input type="hidden" name="id" value="{{ $marcas->id }}">
        <label>Nome da Marca:</label>
        <input type="text" name="marca_nome" class="form-control" value="{{ $marcas->marca_nome }}">
      </div>
      <div class="form-group">
        <label>Logo da marca:</label>
        <input type="text" name="logo" class="form-control" value="{{ $marcas->logo }}">
      </div>
      <div class="d-flex justify-content-between">
        <a href="{{ route('marcas') }}" class="btn btn-secondary">Voltar</a>
        <input type="submit" value="Cadastrar" class="btn btn-primary">
      </div>
    </form>
  </div>
</body>
</html>