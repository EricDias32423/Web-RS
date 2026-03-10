<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cadastro - Mãos Solidárias</title>
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
            right: -50%;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            transform: rotate(-45deg);
            z-index: 0;
        }

        body::after {
            content: '🤝';
            position: absolute;
            bottom: 20px;
            left: 30px;
            font-size: 120px;
            opacity: 0.1;
            transform: rotate(-15deg);
            z-index: 0;
        }

        .register-container {
            width: 100%;
            max-width: 500px;
            margin: 20px;
            position: relative;
            z-index: 1;
        }

        .register-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .register-header .logo {
            font-size: 2rem;
            font-weight: 900;
            color: #2C3E50;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .register-header .logo i {
            font-size: 2.5rem;
        }

        .register-header .logo .logoimg {
            height: 150px;
        }

        .register-header h1 {
            color: #2C3E50;
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .register-header h1 span {
            color: #4ECDC4;
            position: relative;
        }

        .register-header h1 span::after {
            content: '';
            position: absolute;
            bottom: 5px;
            left: 0;
            width: 100%;
            height: 8px;
            background: #FF6B6B;
            opacity: 0.3;
            z-index: -1;
        }

        .register-header p {
            color: #95A5A6;
            font-size: 0.95rem;
        }

        .form-group {
            margin-bottom: 20px;
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
            border-color: #4ECDC4;
            box-shadow: 0 5px 20px rgba(78, 205, 196, 0.2);
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

        .password-requirements {
            margin-top: 8px;
            font-size: 0.8rem;
            color: #95A5A6;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .requirement {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .requirement.met {
            color: #4ECDC4;
        }

        .requirement i {
            font-size: 0.9rem;
        }

        .btn-register {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #4ECDC4 0%, #45B7AA 100%);
            color: white;
            border: none;
            border-radius: 15px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 10px 20px rgba(78, 205, 196, 0.3);
            margin: 25px 0 20px;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(78, 205, 196, 0.4);
        }

        .btn-register:active {
            transform: translateY(0);
        }

        .login-link {
            text-align: center;
            color: #95A5A6;
            font-size: 0.95rem;
        }

        .login-link a {
            color: #FF6B6B;
            text-decoration: none;
            font-weight: 700;
            transition: color 0.3s;
        }

        .login-link a:hover {
            color: #4ECDC4;
            text-decoration: underline;
        }

        .terms {
            margin-top: 15px;
            text-align: center;
            font-size: 0.8rem;
            color: #95A5A6;
        }

        .terms a {
            color: #4ECDC4;
            text-decoration: none;
        }

        .terms a:hover {
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
            .register-card {
                padding: 30px 20px;
            }

            .register-header h1 {
                font-size: 1.8rem;
            }

            .password-requirements {
                flex-direction: column;
                gap: 5px;
            }
        }
    </style>
</head>

<body>
    <div class="register-container">
        <div class="register-card">
            <div class="register-header">
                <div class="logo">
                    <img src="logo.png" alt="" class="logoimg">
                </div>
                <h1>Faça parte <span>dessa missão</span></h1>
                <p>Crie sua conta e comece a ajudar quem precisa</p>
            </div>

            @if ($errors->any())
                <div class="session-message error">
                    <span>⚠️</span>
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" id="registerForm">
                @csrf

                <!-- Name -->
                <div class="form-group">
                    <label for="name"></label>
                    <div class="input-wrapper">
                        <span class="input-icon">👤</span>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required
                            autofocus autocomplete="name" placeholder="Nome completo" />
                    </div>
                    @error('name')
                        <div class="error-message">
                            <span>⚠️</span>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Email Address -->
                <div class="form-group">
                    <div class="input-wrapper">
                        <span class="input-icon">📧</span>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
                            autocomplete="username" placeholder="Email" />
                    </div>
                    @error('email')
                        <div class="error-message">
                            <span>⚠️</span>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Telefone -->
                <div class="form-group">
                    <div class="input-wrapper">
                        <span class="input-icon">📞</span>
                        <input id="telefone" name="telefone" autocomplete="username" placeholder="(00)000000000" />
                    </div>
                </div>

                <!-- Password -->
                <div class="form-group">
                    <div class="input-wrapper">
                        <span class="input-icon">🔒</span>
                        <input id="password" type="password" name="password" required autocomplete="new-password"
                            placeholder="Senha" />
                    </div>
                    @error('password')
                        <div class="error-message">
                            <span>⚠️</span>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <div class="input-wrapper">
                        <span class="input-icon">🔐</span>
                        <input id="password_confirmation" type="password" name="password_confirmation" required
                            autocomplete="new-password" placeholder="Confirme sua Senha" />
                    </div>
                    <div id="passwordMatch" style="font-size:0.8rem; margin-top:5px;"></div>

                    <div class="password-strength">
                        <div class="password-strength-bar" id="passwordStrength"></div>
                    </div>
                </div>

                <button type="submit" class="btn-register" id="submitBtn">
                    <span>🤝</span>
                    Criar minha conta
                </button>

                <div class="login-link">
                    Já tem uma conta?
                    <a href="{{ route('login') }}">Faça login aqui</a>
                </div>

                <div class="terms">
                    Ao se registrar, você concorda com nossos
                    <a href="#">Termos de Uso</a> e
                    <a href="#">Política de Privacidade</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Validação de senha em tempo real
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('password_confirmation');
        const strengthBar = document.getElementById('passwordStrength');
        const submitBtn = document.getElementById('submitBtn');

        const reqLength = document.getElementById('req-length');
        const reqUpper = document.getElementById('req-upper');
        const reqNumber = document.getElementById('req-number');
        const reqSpecial = document.getElementById('req-special');
        const passwordMatch = document.getElementById('passwordMatch');

        function checkPasswordStrength() {
            const pass = password.value;

            // Verificar requisitos
            const hasLength = pass.length >= 8;
            const hasUpper = /[A-Z]/.test(pass);
            const hasNumber = /[0-9]/.test(pass);
            const hasSpecial = /[!@#$%^&*(),.?":{}|<>]/.test(pass);

            // Atualizar indicadores
            updateRequirement(reqLength, hasLength, '✅ Comprimento OK', '🔴 Mínimo 8 caracteres');
            updateRequirement(reqUpper, hasUpper, '✅ Maiúscula OK', '🔴 1 letra maiúscula');
            updateRequirement(reqNumber, hasNumber, '✅ Número OK', '🔴 1 número');
            updateRequirement(reqSpecial, hasSpecial, '✅ Especial OK', '🔴 1 caractere especial');

            // Calcular força
            const strength = [hasLength, hasUpper, hasNumber, hasSpecial].filter(Boolean).length;

            // Atualizar barra
            strengthBar.className = 'password-strength-bar';
            if (strength <= 1) {
                strengthBar.classList.add('weak');
            } else if (strength <= 3) {
                strengthBar.classList.add('medium');
            } else {
                strengthBar.classList.add('strong');
            }
        }

        function updateRequirement(element, condition, textTrue, textFalse) {
            if (condition) {
                element.innerHTML = `<i>✅</i> ${textTrue}`;
                element.classList.add('met');
            } else {
                element.innerHTML = `<i>🔴</i> ${textFalse}`;
                element.classList.remove('met');
            }
        }

        function checkPasswordMatch() {
            if (confirmPassword.value.length > 0) {
                if (password.value === confirmPassword.value) {
                    passwordMatch.innerHTML = '✅ Senhas coincidem';
                    passwordMatch.style.color = '#4ECDC4';
                } else {
                    passwordMatch.innerHTML = '❌ Senhas não coincidem';
                    passwordMatch.style.color = '#FF6B6B';
                }
            } else {
                passwordMatch.innerHTML = '';
            }
        }

        password.addEventListener('input', checkPasswordStrength);
        password.addEventListener('input', checkPasswordMatch);
        confirmPassword.addEventListener('input', checkPasswordMatch);

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
