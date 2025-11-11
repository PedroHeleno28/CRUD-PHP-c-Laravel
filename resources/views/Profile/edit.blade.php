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
    .btn-primary { min-width: 120px; }
</style>

<div class="form-wrapper">
    <h1 class="text-center">Meu Perfil</h1>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" value="{{ old('name', auth()->user()->name) }}" class="form-control" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" class="form-control" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Voltar</a>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
</div>
@endsection