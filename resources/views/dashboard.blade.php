<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard - Mãos Solidárias</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* Elementos decorativos */
        body::before {
            content: '';
            position: fixed;
            top: -50%;
            left: -50%;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            transform: rotate(45deg);
            z-index: 0;
        }

        body::after {
            content: '❤️';
            position: fixed;
            bottom: 20px;
            right: 30px;
            font-size: 120px;
            opacity: 0.1;
            transform: rotate(15deg);
            z-index: 0;
        }

        /* Header/Navbar */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0,0,0,0.05);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 100;
            padding: 15px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 900;
            color: #2C3E50;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo span {
            color: #FF6B6B;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .nav-link {
            color: #2C3E50;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            transition: color 0.3s;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .nav-link:hover {
            color: #FF6B6B;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 8px 20px;
            background: #ECF0F1;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .user-menu:hover {
            background: #FF6B6B;
            color: white;
        }

        .user-avatar {
            width: 35px;
            height: 35px;
            background: #FF6B6B;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
        }

        .user-name {
            font-weight: 600;
        }

        .logout-form button {
            background: none;
            border: none;
            color: #2C3E50;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 8px 15px;
            border-radius: 50px;
            transition: all 0.3s;
        }

        .logout-form button:hover {
            background: #FF6B6B;
            color: white;
        }

        /* Main Content */
        .main-content {
            position: relative;
            z-index: 1;
            padding: 100px 8% 40px;
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Welcome Card */
        .welcome-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 30px;
            padding: 40px;
            margin-bottom: 30px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            animation: fadeInUp 0.8s ease;
        }

        .welcome-header {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .welcome-avatar {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #FF6B6B 0%, #FF8E8E 100%);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: white;
            box-shadow: 0 10px 20px rgba(255, 107, 107, 0.3);
        }

        .welcome-title h1 {
            font-size: 2.5rem;
            font-weight: 800;
            color: #2C3E50;
            margin-bottom: 5px;
        }

        .welcome-title h1 span {
            color: #FF6B6B;
        }

        .welcome-title p {
            color: #95A5A6;
            font-size: 1.1rem;
        }

        .welcome-date {
            margin-top: 20px;
            color: #4ECDC4;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
            animation: fadeInUp 0.8s ease;
            animation-fill-mode: both;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        .stat-card:nth-child(1) { animation-delay: 0.1s; }
        .stat-card:nth-child(2) { animation-delay: 0.2s; }
        .stat-card:nth-child(3) { animation-delay: 0.3s; }
        .stat-card:nth-child(4) { animation-delay: 0.4s; }

        .stat-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
        }

        .stat-icon.blue { background: #e6f0ff; color: #4A90E2; }
        .stat-icon.green { background: #e0f7fa; color: #4ECDC4; }
        .stat-icon.red { background: #ffe6e6; color: #FF6B6B; }
        .stat-icon.purple { background: #f0e6ff; color: #9B59B6; }

        .stat-value {
            font-size: 2.2rem;
            font-weight: 800;
            color: #2C3E50;
            margin-bottom: 5px;
        }

        .stat-label {
            color: #95A5A6;
            font-weight: 500;
            font-size: 0.95rem;
        }

        .stat-change {
            margin-top: 10px;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .stat-change.positive { color: #4ECDC4; }
        .stat-change.negative { color: #FF6B6B; }

        /* Activity Section */
        .activity-section {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 25px;
        }

        .card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            animation: fadeInUp 0.8s ease;
            animation-delay: 0.5s;
            animation-fill-mode: both;
        }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .card-header h3 {
            font-size: 1.3rem;
            font-weight: 700;
            color: #2C3E50;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .view-all {
            color: #4ECDC4;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            transition: color 0.3s;
        }

        .view-all:hover {
            color: #FF6B6B;
        }

        /* Activity List */
        .activity-list {
            list-style: none;
        }

        .activity-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px 0;
            border-bottom: 1px solid #ECF0F1;
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #4ECDC4;
        }

        .activity-dot.warning { background: #FFB347; }
        .activity-dot.danger { background: #FF6B6B; }

        .activity-content {
            flex: 1;
        }

        .activity-title {
            font-weight: 600;
            color: #2C3E50;
            margin-bottom: 5px;
        }

        .activity-time {
            font-size: 0.85rem;
            color: #95A5A6;
        }

        .activity-icon {
            font-size: 1.2rem;
        }

        /* Quick Actions */
        .quick-actions {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-top: 20px;
        }

        .action-btn {
            background: #ECF0F1;
            border: none;
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            color: #2C3E50;
        }

        .action-btn:hover {
            background: #FF6B6B;
            color: white;
            transform: translateY(-3px);
        }

        .action-btn i {
            font-size: 2rem;
            margin-bottom: 10px;
            display: block;
        }

        .action-btn span {
            font-weight: 600;
            font-size: 0.9rem;
        }

        /* Animations */
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

        /* Responsividade */
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                gap: 15px;
                padding: 15px 5%;
            }

            .nav-menu {
                flex-wrap: wrap;
                justify-content: center;
            }

            .activity-section {
                grid-template-columns: 1fr;
            }

            .welcome-header {
                flex-direction: column;
                text-align: center;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <a href="{{ route('home') }}" class="logo">
            <i>❤️</i> Mãos<span>Solidárias</span>
        </a>
        
        <div class="nav-menu">
            <a href="#" class="nav-link">
                <span>📊</span> Dashboard
            </a>
            <a href="#" class="nav-link">
                <span>🤝</span> Projetos
            </a>
            <a href="#" class="nav-link">
                <span>📅</span> Eventos
            </a>
            <a href="#" class="nav-link">
                <span>📞</span> Contato
            </a>
            
            @auth
                <div class="user-menu">
                    <div class="user-avatar">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <span class="user-name">{{ Auth::user()->name }}</span>
                </div>
                
                <form method="POST" action="{{ route('logout') }}" class="logout-form">
                    @csrf
                    <button type="submit">
                        <span>🚪</span> Sair
                    </button>
                </form>
            @endauth
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Welcome Card -->
        <div class="welcome-card">
            <div class="welcome-header">
                <div class="welcome-avatar">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div class="welcome-title">
                    <h1>Bem-vindo de volta, <span>{{ Auth::user()->name }}</span>!</h1>
                    <p>Que bom ter você conosco nessa missão de transformar vidas.</p>
                </div>
            </div>
            <div class="welcome-date">
                <span>📅</span> 
                {{ now()->format('d/m/Y') }} - 
                {{ now()->format('H:i') }}
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon blue">🤝</div>
                </div>
                <div class="stat-value">156</div>
                <div class="stat-label">Voluntários Ativos</div>
                <div class="stat-change positive">
                    <span>↑</span> +12 este mês
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon green">❤️</div>
                </div>
                <div class="stat-value">1.234</div>
                <div class="stat-label">Vidas Impactadas</div>
                <div class="stat-change positive">
                    <span>↑</span> +89 este mês
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon red">📦</div>
                </div>
                <div class="stat-value">45</div>
                <div class="stat-label">Projetos Ativos</div>
                <div class="stat-change positive">
                    <span>↑</span> +3 este mês
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon purple">💰</div>
                </div>
                <div class="stat-value">R$ 12.5k</div>
                <div class="stat-label">Doações (mês)</div>
                <div class="stat-change positive">
                    <span>↑</span> +25% vs mês passado
                </div>
            </div>
        </div>

        <!-- Activity Section -->
        <div class="activity-section">
            <!-- Recent Activity -->
            <div class="card">
                <div class="card-header">
                    <h3>
                        <span>📋</span> Atividades Recentes
                    </h3>
                    <a href="#" class="view-all">Ver todas</a>
                </div>
                <ul class="activity-list">
                    <li class="activity-item">
                        <div class="activity-dot"></div>
                        <div class="activity-content">
                            <div class="activity-title">Nova doação recebida</div>
                            <div class="activity-time">Há 5 minutos</div>
                        </div>
                        <div class="activity-icon">🎉</div>
                    </li>
                    <li class="activity-item">
                        <div class="activity-dot warning"></div>
                        <div class="activity-content">
                            <div class="activity-title">Voluntário cadastrado</div>
                            <div class="activity-time">Há 2 horas</div>
                        </div>
                        <div class="activity-icon">👤</div>
                    </li>
                    <li class="activity-item">
                        <div class="activity-dot danger"></div>
                        <div class="activity-content">
                            <div class="activity-title">Evento agendado</div>
                            <div class="activity-time">Há 5 horas</div>
                        </div>
                        <div class="activity-icon">📅</div>
                    </li>
                    <li class="activity-item">
                        <div class="activity-dot"></div>
                        <div class="activity-content">
                            <div class="activity-title">Meta de arrecadação atingida</div>
                            <div class="activity-time">Há 1 dia</div>
                        </div>
                        <div class="activity-icon">🏆</div>
                    </li>
                </ul>
            </div>

            <!-- Quick Actions & Info -->
            <div class="card">
                <div class="card-header">
                    <h3>
                        <span>⚡</span> Ações Rápidas
                    </h3>
                </div>
                
                <div class="quick-actions">
                    <a href="#" class="action-btn">
                        <i>🤝</i>
                        <span>Novo Voluntário</span>
                    </a>
                    <a href="#" class="action-btn">
                        <i>📦</i>
                        <span>Novo Projeto</span>
                    </a>
                    <a href="#" class="action-btn">
                        <i>💰</i>
                        <span>Registrar Doação</span>
                    </a>
                    <a href="#" class="action-btn">
                        <i>📅</i>
                        <span>Agendar Evento</span>
                    </a>
                </div>

                <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #ECF0F1;">
                    <h4 style="color: #2C3E50; margin-bottom: 15px;">📊 Suas Informações</h4>
                    <div style="display: grid; gap: 10px;">
                        <div style="display: flex; justify-content: space-between;">
                            <span style="color: #95A5A6;">Membro desde:</span>
                            <span style="color: #2C3E50; font-weight: 600;">{{ Auth::user()->created_at->format('d/m/Y') }}</span>
                        </div>
                        <div style="display: flex; justify-content: space-between;">
                            <span style="color: #95A5A6;">Email:</span>
                            <span style="color: #2C3E50; font-weight: 600;">{{ Auth::user()->email }}</span>
                        </div>
                        <div style="display: flex; justify-content: space-between;">
                            <span style="color: #95A5A6;">Status:</span>
                            <span style="color: #4ECDC4; font-weight: 600;">Ativo ✅</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Auto-esconder mensagens se houver
        setTimeout(function() {
            const messages = document.querySelectorAll('.session-message');
            messages.forEach(function(message) {
                message.style.transition = 'opacity 0.5s ease';
                message.style.opacity = '0';
                setTimeout(() => message.remove(), 500);
            });
        }, 5000);
    </script>
</body>
</html>