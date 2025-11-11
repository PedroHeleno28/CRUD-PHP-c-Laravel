@extends('template_dashboard.index')

@section('conteudo')
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

    .form-wrapper h1 { margin-bottom: 1rem; }
    .form-group { margin-bottom: 1rem; }
    .btn-primary { min-width: 140px; }
</style>

<div class="form-wrapper">
    <h1 class="text-center">Alterar Senha</h1>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('password.update') }}">
        @csrf   
        @method('PUT')     

        <div class="form-group">
            <label for="current_password">Senha atual:</label>
            <input type="password" id="current_password" name="current_password" class="form-control" required>
            @error('current_password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Nova senha:</label>
            <input type="password" id="password" name="password" class="form-control" required>
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirmar nova senha:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Voltar</a>
            <button type="submit" class="btn btn-primary">Alterar Senha</button>
        </div>
    </form>
</div>
@endsection