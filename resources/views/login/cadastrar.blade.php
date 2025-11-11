@extends('template_login.index')
@section('login')

<div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Cadastre-se</h2>
                        <form method="POST" action="{{ route('register.store') }}"class="register-form" id="register-form">
                            @csrf
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Nome" value="{{ old('name') }}" required autofocus/>
                                @error('name')
                                    <span class="text-danger" style="font-size: 12px; display: block; margin-top: 5px;">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}" required/>
                                @error('email')
                                    <span class="text-danger" style="font-size: 12px; display: block; margin-top: 5px;">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Senha" required/>
                                @error('password')
                                    <span class="text-danger" style="font-size: 12px; display: block; margin-top: 5px;">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirme sua senha" required/>
                            </div>                            
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="https://i.ibb.co/3KHQ5B2/Design-sem-nome.png" alt="sing up image"></figure>
                        <a href="{{ route('login') }}" class="signup-image-link">Fazer login</a>
                    </div>
</div>          
@endsection                