@php
    if (session()->has('errors')) {
        echo '<div style="background:red;color:white;padding:10px;">ERROS: ' .
            json_encode(session('errors')->all()) .
            '</div>';
    }

    if (Auth::check()) {
        echo '<div style="background:green;color:white;padding:10px;">JÁ ESTÁ LOGADO: ' .
            Auth::user()->email .
            '</div>';
    }
@endphp
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - Mãos Solidárias</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #ffffff 0%, #ffffff 100%);
            position: relative;
            overflow: hidden;
        }

        /* Elementos decorativos */
        body::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            transform: rotate(45deg);
            z-index: 0;
        }

        body::after {
            content: '❤️';
            position: absolute;
            bottom: 20px;
            right: 30px;
            font-size: 100px;
            opacity: 0.1;
            transform: rotate(15deg);
            z-index: 0;
        }

        .login-container {
            width: 100%;
            max-width: 450px;
            margin: 20px;
            position: relative;
            z-index: 1;
        }

        .login-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .login-header .logo {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .login-header .logo .logoimg {
            height: 150px;
        }

        .login-header h1 {
            color: #2C3E50;
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .login-header h1 span {
            color: #FF6B6B;
            position: relative;
        }

        .login-header h1 span::after {
            content: '';
            position: absolute;
            bottom: 5px;
            left: 0;
            width: 100%;
            height: 8px;
            background: #4ECDC4;
            opacity: 0.3;
            z-index: -1;
        }

        .login-header p {
            color: #95A5A6;
            font-size: 0.95rem;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #2C3E50;
            font-weight: 600;
            font-size: 0.95rem;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            color: #95A5A6;
            font-size: 1.2rem;
            z-index: 1;
        }

        .input-wrapper input {
            width: 100%;
            padding: 15px 15px 15px 50px;
            border: 2px solid #ECF0F1;
            border-radius: 15px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
            color: #2C3E50;
            font-family: 'Inter', sans-serif;
        }

        .input-wrapper input:focus {
            outline: none;
            border-color: #FF6B6B;
            box-shadow: 0 5px 20px rgba(255, 107, 107, 0.2);
        }

        .input-wrapper input::placeholder {
            color: #BDC3C7;
            font-size: 0.95rem;
        }

        .error-message {
            color: #FF6B6B;
            font-size: 0.85rem;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .divisão {
            margin-bottom: unset;
            margin-bottom: 50px;
        }

        .checkbox-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 25px;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 30px;
        }

        .checkbox-label {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #2C3E50;
            font-size: 0.95rem;
            cursor: pointer;
        }

        .checkbox-label input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: #FF6B6B;
        }

        .forgot-link {
            color: #4ECDC4;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: color 0.3s;
        }

        .forgot-link:hover {
            color: #FF6B6B;
            text-decoration: underline;
        }

        .btn-google {
            width: 100%;
            padding: 16px;
            border: none;
            border-radius: 15px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 10px 20px rgba(176, 176, 176, 0.3);
            margin-top: 60px;
            margin-bottom: 70px;
        }

        .btn-google:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(176, 176, 176, 0.4);
        }

        .btn-login {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #FF6B6B 0%, #FF8E8E 100%);
            color: white;
            border: none;
            border-radius: 15px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 10px 20px rgba(255, 107, 107, 0.3);
            margin-bottom: 20px;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(255, 107, 107, 0.4);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .register-link {
            text-align: center;
            color: #95A5A6;
            font-size: 0.95rem;
        }

        .password-strength {
            margin-top: 8px;
            height: 5px;
            border-radius: 10px;
            background: #ECF0F1;
            overflow: hidden;
        }

        .password-strength-bar {
            height: 100%;
            width: 0%;
            transition: all 0.3s ease;
        }

        .password-strength-bar.weak {
            width: 33.33%;
            background: #FF6B6B;
        }

        .password-strength-bar.medium {
            width: 66.66%;
            background: #FFB347;
        }

        .password-strength-bar.strong {
            width: 100%;
            background: #4ECDC4;
        }

        .register-link a {
            color: #FF6B6B;
            text-decoration: none;
            font-weight: 700;
            transition: color 0.3s;
        }

        .register-link a:hover {
            color: #4ECDC4;
            text-decoration: underline;
        }

        .session-message {
            background: #4ECDC4;
            color: white;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            animation: slideIn 0.5s ease;
        }

        .session-message.error {
            background: #FF6B6B;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsividade */
        @media (max-width: 480px) {
            .login-card {
                padding: 30px 20px;
            }

            .checkbox-wrapper {
                flex-direction: column;
                align-items: flex-start;
            }

            .login-header h1 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="logo">
                    <img src="logo.png" alt="" class="logoimg">
                </div>
                <h1>Bem-vindo <span>de volta</span></h1>
                <p>Faça login para continuar ajudando quem precisa</p>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="session-message">
                    <span>✅</span>
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="session-message error">
                    <span>⚠️</span>
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="form-group">
                    <div class="input-wrapper">
                        <span class="input-icon">📧</span>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
                            autofocus autocomplete="username" placeholder="Email" />
                    </div>
                    @error('email')
                        <div class="error-message">
                            <span>⚠️</span>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <div class="input-wrapper">
                        <span class="input-icon">🔒</span>
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            placeholder="Senha" />
                    </div>
                    @error('password')
                        <div class="error-message">
                            <span>⚠️</span>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn-login">
                    <span>🔓</span>
                    Entrar
                </button>

                <div class="password-strength">
                    <div class="password-strength-bar" id="passwordStrength"></div>
                </div>

                <button class="btn-google">
                    Entrar com Google
                </button>

                <!-- Remember Me & Forgot Password -->
                <div class="checkbox-wrapper">
                    <label for="remember_me" class="checkbox-label">
                        <input id="remember_me" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span>Lembrar-me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="forgot-link" href="{{ route('password.request') }}">
                            Esqueceu sua senha?
                        </a>
                    @endif
                </div>

                <div class="register-link">
                    Ainda não tem uma conta?
                    <a href="{{ route('register') }}">Cadastre-se aqui</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Auto-esconder mensagens após 5 segundos
        setTimeout(function() {
            const messages = document.querySelectorAll('.session-message');
            messages.forEach(function(message) {
                message.style.transition = 'opacity 0.5s ease';
                message.style.opacity = '0';
                setTimeout(function() {
                    if (message.parentNode) {
                        message.remove();
                    }
                }, 500);
            });
        }, 5000);
    </script>
</body>

</html>
