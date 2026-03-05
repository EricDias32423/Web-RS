<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mãos Solidárias - ONG</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #FF6B6B;    /* Vermelho suave/coral */
            --primary-light: #FF8E8E;
            --secondary: #4ECDC4;   /* Verde água */
            --white: #ffffff;
            --dark: #2C3E50;        /* Azul escuro suave */
            --gray: #95A5A6;
            --gray-light: #ECF0F1;
            --overlay: rgba(44, 62, 80, 0.85);
        }

        * { 
            margin: 0; 
            padding: 0; 
            box-sizing: border-box; 
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--white);
            color: var(--dark);
            overflow-x: hidden;
        }

        /* Background com padrão suave */
        .hero-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--overlay) 0%, var(--overlay) 100%),
                        url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI4MCIgaGVpZ2h0PSI4MCIgdmlld0JveD0iMCAwIDQwIDQwIj48cGF0aCBkPSJNMjAgM0wzIDExdjE4bDE3IDggMTctOHYtMTB6IiBmaWxsPSIjZmZmIiBmaWxsLW9wYWNpdHk9IjAuMDMiLz48L3N2Zz4=');
            background-repeat: repeat;
            z-index: -1;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 25px 8%;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0,0,0,0.05);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 100;
        }

        .logo { 
            font-size: 1.8rem; 
            font-weight: 900; 
            letter-spacing: -1px;
            color: var(--dark);
            text-decoration: none;
        }

        .logo span { 
            color: var(--primary);
        }

        .logo i {
            color: var(--secondary);
            margin-right: 5px;
        }

        nav { 
            display: flex; 
            gap: 40px; 
            align-items: center; 
        }

        nav a { 
            text-decoration: none; 
            color: var(--dark); 
            font-weight: 600; 
            font-size: 0.95rem;
            transition: color 0.3s;
            position: relative;
        }

        nav a:hover {
            color: var(--primary);
        }

        .btn-donate {
            background: var(--primary);
            color: var(--white) !important;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 700;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(255, 107, 107, 0.3);
        }

        .btn-donate:hover {
            background: var(--primary-light);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 107, 107, 0.4);
            color: var(--white) !important;
        }

        .hero-content {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 120px 8% 80px;
            position: relative;
            z-index: 5;
        }

        .intro {
            max-width: 650px;
        }

        .badge {
            background: var(--secondary);
            color: var(--white);
            padding: 8px 18px;
            border-radius: 50px;
            font-size: 0.85rem;
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 1px;
            width: fit-content;
            box-shadow: 0 2px 10px rgba(78, 205, 196, 0.3);
        }

        h1 {
            font-size: clamp(2.5rem, 7vw, 4.5rem);
            line-height: 1.1;
            margin: 25px 0 20px;
            font-weight: 900;
            color: var(--dark);
        }

        h1 span {
            color: var(--primary);
            position: relative;
            display: inline-block;
        }

        h1 span::after {
            content: '';
            position: absolute;
            bottom: 5px;
            left: 0;
            width: 100%;
            height: 8px;
            background: var(--secondary);
            opacity: 0.3;
            z-index: -1;
        }

        p {
            font-size: 1.2rem;
            color: var(--gray);
            line-height: 1.6;
            margin-bottom: 40px;
        }

        .cta-buttons { 
            display: flex; 
            gap: 20px; 
            flex-wrap: wrap;
            margin-bottom: 50px;
        }

        .btn-primary {
            background: var(--primary);
            color: var(--white);
            padding: 16px 40px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            font-size: 1.1rem;
            transition: all 0.3s;
            border: 2px solid var(--primary);
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .btn-primary:hover { 
            background: transparent;
            color: var(--primary);
            transform: translateY(-3px);
        }

        .btn-secondary {
            background: transparent;
            color: var(--dark);
            padding: 16px 40px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s;
            border: 2px solid var(--gray-light);
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .btn-secondary:hover {
            border-color: var(--secondary);
            color: var(--secondary);
            transform: translateY(-3px);
        }

        .stats {
            display: flex;
            gap: 50px;
            margin-top: 20px;
        }

        .stat-item {
            text-align: left;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 900;
            color: var(--primary);
            line-height: 1;
        }

        .stat-label {
            font-size: 0.9rem;
            color: var(--gray);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin-top: 60px;
            background: rgba(255,255,255,0.9);
            padding: 40px;
            border-radius: 30px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.05);
            backdrop-filter: blur(10px);
        }

        .feature-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            background: var(--secondary);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            color: var(--white);
            box-shadow: 0 5px 15px rgba(78, 205, 196, 0.3);
        }

        .feature-text h4 {
            font-size: 1.1rem;
            color: var(--dark);
            margin-bottom: 8px;
            font-weight: 700;
        }

        .feature-text p {
            font-size: 0.9rem;
            color: var(--gray);
            margin: 0;
            line-height: 1.5;
        }

        /* Mensagens de sessão */
        .session-message {
            position: fixed;
            top: 100px;
            right: 30px;
            padding: 15px 25px;
            border-radius: 10px;
            font-weight: 600;
            z-index: 1000;
            animation: slideIn 0.5s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .session-message.success {
            background: #c6f6d5;
            color: #22543d;
            border-left: 5px solid #48bb78;
        }

        .session-message.error {
            background: #fed7d7;
            color: #742a2a;
            border-left: 5px solid #f56565;
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        /* User menu quando logado */
        .user-menu {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-name {
            color: var(--primary);
            font-weight: 600;
        }

        .btn-logout {
            background: var(--gray-light);
            color: var(--dark);
            border: none;
            padding: 8px 20px;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 0.9rem;
        }

        .btn-logout:hover {
            background: var(--primary);
            color: var(--white);
        }

        @media (max-width: 768px) {
            header {
                flex-direction: column;
                gap: 15px;
                padding: 15px 5%;
            }

            nav {
                gap: 20px;
                flex-wrap: wrap;
                justify-content: center;
            }

            .features {
                grid-template-columns: 1fr;
                padding: 30px 20px;
            }

            .stats {
                flex-direction: column;
                gap: 20px;
            }

            h1 {
                font-size: clamp(2rem, 8vw, 3rem);
            }

            .hero-content {
                padding-top: 180px;
            }

            .session-message {
                top: auto;
                bottom: 20px;
                right: 20px;
                left: 20px;
            }
        }

        /* Animações */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .badge, h1, p, .cta-buttons, .stats, .features {
            animation: fadeInUp 0.8s ease forwards;
        }

        .badge { animation-delay: 0.2s; }
        h1 { animation-delay: 0.4s; }
        p { animation-delay: 0.6s; }
        .cta-buttons { animation-delay: 0.8s; }
        .stats { animation-delay: 1s; }
        .features { animation-delay: 1.2s; }
    </style>
</head>
<body>
    <div class="hero-bg"></div>

    <!-- Mensagens de sessão -->
    @if(session('status'))
        <div class="session-message success">
            {{ session('status') }}
        </div>
    @endif

    @if(session('success'))
        <div class="session-message success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="session-message error">
            @foreach($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif

    <header>
        <a href="{{ route('home') }}" class="logo">
            <i>❤️</i> Mãos<span>Solidárias</span>
        </a>
        <nav>
            <a href="#">Quem Somos</a>
            <a href="#">Projetos</a>
            <a href="#">Voluntariado</a>
            <a href="#">Transparência</a>
            
            @auth
                <div class="user-menu">
                    <span class="user-name">Olá, {{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn-logout">Sair</button>
                    </form>
                </div>
            @else
                <a href="{{ route('login') }}">Entrar</a>
                <a href="{{ route('register') }}" class="btn-donate">Seja Membro</a>
            @endauth
        </nav>
    </header>

    <main class="hero-content">
        <section class="intro">
            <span class="badge">🌟 JUNTOS PODEMOS MAIS</span>
            <h1>TRANSFORMANDO <span>VIDAS</span><br>COM SOLIDARIEDADE</h1>
            <p>Há mais de 10 anos levando esperança, educação e dignidade para comunidades vulneráveis. Cada gesto de amor constrói um futuro melhor para quem mais precisa.</p>
           
            <div class="cta-buttons">
                @auth
                    <a href="{{ route('dashboard') }}" class="btn-primary">
                        <span>📊</span> Meu Dashboard
                    </a>
                    <a href="{{ route('profile.edit') }}" class="btn-secondary">
                        <span>👤</span> Meu Perfil
                    </a>
                @else
                    <a href="{{ route('register') }}" class="btn-primary">
                        <span>✋</span> Seja Voluntário
                    </a>
                    <a href="{{ route('login') }}" class="btn-secondary">
                        <span>❤️</span> Quero Doar
                    </a>
                @endauth
            </div>

            <div class="stats">
                <div class="stat-item">
                    <div class="stat-number">+10k</div>
                    <div class="stat-label">Vidas Impactadas</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">+500</div>
                    <div class="stat-label">Voluntários Ativos</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">15</div>
                    <div class="stat-label">Projetos Sociais</div>
                </div>
            </div>

            <div class="features">
                <div class="feature-item">
                    <div class="feature-icon">📚</div>
                    <div class="feature-text">
                        <h4>Educação</h4>
                        <p>Aulas de reforço e alfabetização para crianças e adultos</p>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">🍲</div>
                    <div class="feature-text">
                        <h4>Distribuição de Alimentos</h4>
                        <p>Cestas básicas e refeições para famílias em situação de rua</p>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">🏥</div>
                    <div class="feature-text">
                        <h4>Apoio à Saúde</h4>
                        <p>Consultas, medicamentos e acompanhamento médico</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script>
        // Auto-esconder mensagens após 5 segundos
        setTimeout(function() {
            const messages = document.querySelectorAll('.session-message');
            messages.forEach(function(message) {
                message.style.opacity = '0';
                message.style.transition = 'opacity 0.5s ease';
                setTimeout(function() {
                    message.remove();
                }, 500);
            });
        }, 5000);
    </script>
</body>
</html>