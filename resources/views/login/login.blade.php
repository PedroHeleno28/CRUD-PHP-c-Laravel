@extends('template_login.index')
@section('login')

<div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="https://i.ibb.co/3KHQ5B2/Design-sem-nome.png" alt="sing up image"></figure>
                        <a href="{{ route('register') }}" class="signup-image-link">Criar uma conta</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Entrar</h2>
                        <form method="POST" action="{{ route('login.store') }}" class="register-form" id="login-form">
                            @csrf
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email material-icons-name"></i></label>
                                <input type="email" name="email" id="email" placeholder="Seu email" required/>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Senha" required/>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>                            
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Entrar"/>
                            </div>
                        </form>                        
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- JS -->
    <script src="{{ asset('vendor_login/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js_login/main.js') }}"></script>
</body>
</html>
@endsection