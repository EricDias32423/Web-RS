<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Social | Sidebar + Destaques + Feed</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f0f2f5;
            min-height: 100vh;
        }

        /* Layout principal */
        .app-wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, #1a2639 0%, #0d1b2a 100%);
            color: white;
            padding: 2rem 1.5rem;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            box-shadow: 4px 0 10px rgba(0,0,0,0.1);
            z-index: 1000;
        }

        .sidebar-logo {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 2.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            color: #fff;
            letter-spacing: -0.5px;
        }

        .sidebar-logo i {
            color: #4cc9f0;
            margin-right: 10px;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
        }

        .sidebar-menu li {
            margin-bottom: 0.8rem;
        }

        .sidebar-menu a {
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 0.8rem 1rem;
            border-radius: 12px;
            transition: all 0.3s;
            font-weight: 500;
        }

        .sidebar-menu a:hover {
            background: rgba(255,255,255,0.1);
            color: white;
            transform: translateX(5px);
        }

        .sidebar-menu a.active {
            background: linear-gradient(90deg, #4cc9f0, #4361ee);
            color: white;
            box-shadow: 0 5px 15px rgba(76, 201, 240, 0.3);
        }

        .sidebar-menu i {
            margin-right: 12px;
            font-size: 1.3rem;
            width: 24px;
            text-align: center;
        }

        .sidebar-footer {
            position: absolute;
            bottom: 2rem;
            left: 1.5rem;
            right: 1.5rem;
            padding-top: 1rem;
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        .user-info-sidebar {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar-small {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #4cc9f0;
        }

        /* Conteúdo principal */
        .main-content {
            flex: 1;
            margin-left: 280px;
            padding: 2rem;
        }

        /* Container do perfil */
        .profile-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Capa do perfil */
        .profile-cover {
            height: 300px;
            background: linear-gradient(135deg, #4158D0, #C850C0, #FFCC70);
            border-radius: 24px;
            position: relative;
            margin-bottom: 80px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }

        /* Avatar (sua imagem) */
        .profile-avatar-wrapper {
            position: absolute;
            bottom: -50px;
            left: 40px;
            border: 5px solid white;
            border-radius: 50%;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            transition: transform 0.3s;
        }

        .profile-avatar-wrapper:hover {
            transform: scale(1.05);
        }

        .profile-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            background: white;
        }

        /* Informações do perfil */
        .profile-header {
            background: white;
            border-radius: 24px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }

        .profile-name-section {
            margin-left: 180px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .profile-name h1 {
            font-size: 2.2rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 0.3rem;
        }

        .profile-bio {
            color: #64748b;
            font-size: 1rem;
            max-width: 500px;
        }

        .profile-stats {
            display: flex;
            gap: 2.5rem;
            background: #f8fafc;
            padding: 1rem 2rem;
            border-radius: 50px;
        }

        .stat {
            text-align: center;
        }

        .stat-number {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1e293b;
            display: block;
        }

        .stat-label {
            font-size: 0.85rem;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-edit-profile {
            background: linear-gradient(90deg, #4cc9f0, #4361ee);
            color: white;
            border: none;
            padding: 0.6rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            transition: opacity 0.3s;
        }

        .btn-edit-profile:hover {
            opacity: 0.9;
            color: white;
        }

        /* Grid de conteúdo */
        .content-grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 2rem;
        }

        /* Sidebar direita (informações adicionais) */
        .info-sidebar {
            background: white;
            border-radius: 24px;
            padding: 1.5rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            height: fit-content;
        }

        .info-section {
            margin-bottom: 2rem;
        }

        .info-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .info-title i {
            color: #4cc9f0;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0.8rem 0;
            border-bottom: 1px solid #e2e8f0;
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-icon {
            width: 35px;
            height: 35px;
            background: #f1f5f9;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #4cc9f0;
        }

        /* Área de destaques */
        .highlights-section {
            background: white;
            border-radius: 24px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }

        .highlights-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .highlights-header h3 {
            font-size: 1.3rem;
            font-weight: 600;
            color: #1e293b;
            margin: 0;
        }

        .highlights-header i {
            color: #4cc9f0;
            cursor: pointer;
            transition: transform 0.2s;
        }

        .highlights-header i:hover {
            transform: scale(1.1);
        }

        .highlights-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1rem;
        }

        .highlight-card {
            text-align: center;
            cursor: pointer;
            transition: transform 0.2s;
        }

        .highlight-card:hover {
            transform: translateY(-5px);
        }

        .highlight-circle {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, #4158D0, #C850C0);
            margin: 0 auto 0.8rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 3px solid white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .highlight-circle i {
            font-size: 2rem;
            color: white;
        }

        .highlight-label {
            font-weight: 500;
            color: #1e293b;
            font-size: 0.9rem;
        }

        .highlight-count {
            font-size: 0.8rem;
            color: #64748b;
        }

        /* Feed de postagens */
        .feed-section {
            background: white;
            border-radius: 24px;
            padding: 1.5rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }

        .feed-tabs {
            display: flex;
            gap: 1rem;
            border-bottom: 2px solid #e2e8f0;
            margin-bottom: 1.5rem;
        }

        .feed-tab {
            padding: 0.8rem 1.5rem;
            font-weight: 600;
            color: #64748b;
            cursor: pointer;
            border-bottom: 3px solid transparent;
            transition: all 0.2s;
        }

        .feed-tab:hover {
            color: #4cc9f0;
        }

        .feed-tab.active {
            color: #4cc9f0;
            border-bottom-color: #4cc9f0;
        }

        /* Post item */
        .post-item {
            display: flex;
            gap: 1rem;
            padding: 1.5rem 0;
            border-bottom: 1px solid #e2e8f0;
        }

        .post-item:last-child {
            border-bottom: none;
        }

        .post-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        .post-content {
            flex: 1;
        }

        .post-header {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            margin-bottom: 0.5rem;
            flex-wrap: wrap;
        }

        .post-author {
            font-weight: 700;
            color: #1e293b;
        }

        .post-time {
            font-size: 0.85rem;
            color: #64748b;
        }

        .post-text {
            color: #334155;
            margin-bottom: 1rem;
            line-height: 1.5;
        }

        .post-image {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            border-radius: 16px;
            margin-bottom: 1rem;
        }

        .post-actions {
            display: flex;
            gap: 2rem;
        }

        .post-action {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #64748b;
            cursor: pointer;
            transition: color 0.2s;
        }

        .post-action:hover {
            color: #4cc9f0;
        }

        .post-action i {
            font-size: 1.2rem;
        }

        /* Responsividade */
        @media (max-width: 992px) {
            .sidebar {
                width: 80px;
                padding: 1rem 0.5rem;
            }
            
            .sidebar-logo span, .sidebar-menu span, .user-info-sidebar span {
                display: none;
            }
            
            .sidebar-logo i {
                margin: 0;
                font-size: 2rem;
            }
            
            .sidebar-menu a {
                justify-content: center;
                padding: 1rem 0;
            }
            
            .sidebar-menu i {
                margin: 0;
                font-size: 1.5rem;
            }
            
            .sidebar-footer .user-info-sidebar {
                justify-content: center;
            }
            
            .main-content {
                margin-left: 80px;
            }
            
            .profile-name-section {
                margin-left: 0;
                margin-top: 60px;
            }
            
            .profile-avatar-wrapper {
                left: 50%;
                transform: translateX(-50%);
            }
            
            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .highlights-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .profile-stats {
                gap: 1rem;
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="app-wrapper">
        <!-- Sidebar fixa -->
        <aside class="sidebar">
            <div class="sidebar-logo">
                <i class="bi bi-grid-3x3-gap-fill"></i>
                <span>SocialLink</span>
            </div>
            
            <ul class="sidebar-menu">
                <li><a href="#" class="active"><i class="bi bi-house-door-fill"></i> <span>Feed</span></a></li>
                <li><a href="#"><i class="bi bi-search"></i> <span>Explorar</span></a></li>
                <li><a href="#"><i class="bi bi-bell-fill"></i> <span>Notificações</span></a></li>
                <li><a href="#"><i class="bi bi-envelope-fill"></i> <span>Mensagens</span></a></li>
                <li><a href="#"><i class="bi bi-bookmark-fill"></i> <span>Salvos</span></a></li>
                <li><a href="#"><i class="bi bi-person-fill"></i> <span>Perfil</span></a></li>
                <li><a href="#"><i class="bi bi-gear-fill"></i> <span>Configurações</span></a></li>
            </ul>
            
            <div class="sidebar-footer">
                <div class="user-info-sidebar">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="User" class="user-avatar-small">
                    <span>Ana Beatriz</span>
                </div>
            </div>
        </aside>

        <!-- Conteúdo principal -->
        <main class="main-content">
            <div class="profile-container">
                <!-- Capa do perfil -->
                <div class="profile-cover">
                    <!-- Avatar (sua imagem) -->
                    <div class="profile-avatar-wrapper">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Foto de perfil" class="profile-avatar">
                    </div>
                </div>

                <!-- Header do perfil -->
                <div class="profile-header">
                    <div class="profile-name-section">
                        <div class="profile-name">
                            <h1>Ana Beatriz</h1>
                            <div class="profile-bio">
                                <i class="bi bi-quote me-2"></i>
                                Designer & fotógrafa | Amante de café e viagens ✨
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center gap-3">
                            <div class="profile-stats">
                                <div class="stat">
                                    <span class="stat-number">157</span>
                                    <span class="stat-label">Posts</span>
                                </div>
                                <div class="stat">
                                    <span class="stat-number">2.8k</span>
                                    <span class="stat-label">Seguidores</span>
                                </div>
                                <div class="stat">
                                    <span class="stat-number">421</span>
                                    <span class="stat-label">Seguindo</span>
                                </div>
                            </div>
                            <button class="btn-edit-profile">
                                <i class="bi bi-pencil-square me-2"></i>Editar Perfil
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Grid de conteúdo: Sidebar info + Feed -->
                <div class="content-grid">
                    <!-- Sidebar direita (info adicional) -->
                    <aside class="info-sidebar">
                        <div class="info-section">
                            <div class="info-title">
                                <i class="bi bi-info-circle-fill"></i>
                                Sobre mim
                            </div>
                            <div class="info-item">
                                <div class="info-icon"><i class="bi bi-briefcase-fill"></i></div>
                                <div>
                                    <small class="text-secondary">Trabalho</small>
                                    <div class="fw-semibold">Designer na Creativa</div>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-icon"><i class="bi bi-mortarboard-fill"></i></div>
                                <div>
                                    <small class="text-secondary">Educação</small>
                                    <div class="fw-semibold">UFMG - Design</div>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-icon"><i class="bi bi-geo-alt-fill"></i></div>
                                <div>
                                    <small class="text-secondary">Localização</small>
                                    <div class="fw-semibold">São Paulo, SP</div>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-icon"><i class="bi bi-calendar-heart-fill"></i></div>
                                <div>
                                    <small class="text-secondary">Entrou em</small>
                                    <div class="fw-semibold">Março de 2022</div>
                                </div>
                            </div>
                        </div>

                        <div class="info-section">
                            <div class="info-title">
                                <i class="bi bi-camera-fill"></i>
                                Destaques rápidos
                            </div>
                            <div class="d-flex flex-wrap gap-2">
                                <span class="badge bg-light text-dark p-2">Fotografia</span>
                                <span class="badge bg-light text-dark p-2">Design</span>
                                <span class="badge bg-light text-dark p-2">Viagens</span>
                                <span class="badge bg-light text-dark p-2">Café</span>
                                <span class="badge bg-light text-dark p-2">Arte</span>
                                <span class="badge bg-light text-dark p-2">Tecnologia</span>
                            </div>
                        </div>
                    </aside>

                    <!-- Área principal: Destaques + Feed -->
                    <div class="main-feed-area">
                        <!-- Seção de Destaques -->
                        <section class="highlights-section">
                            <div class="highlights-header">
                                <h3><i class="bi bi-star-fill me-2" style="color: #ffc107;"></i>Destaques</h3>
                                <i class="bi bi-arrow-right-circle-fill fs-4"></i>
                            </div>
                            
                            <div class="highlights-grid">
                                <div class="highlight-card">
                                    <div class="highlight-circle">
                                        <i class="bi bi-camera-fill"></i>
                                    </div>
                                    <div class="highlight-label">Fotografia</div>
                                    <div class="highlight-count">12 posts</div>
                                </div>
                                <div class="highlight-card">
                                    <div class="highlight-circle">
                                        <i class="bi bi-airplane-fill"></i>
                                    </div>
                                    <div class="highlight-label">Viagens</div>
                                    <div class="highlight-count">8 posts</div>
                                </div>
                                <div class="highlight-card">
                                    <div class="highlight-circle">
                                        <i class="bi bi-cup-hot-fill"></i>
                                    </div>
                                    <div class="highlight-label">Café</div>
                                    <div class="highlight-count">15 posts</div>
                                </div>
                                <div class="highlight-card">
                                    <div class="highlight-circle">
                                        <i class="bi bi-palette-fill"></i>
                                    </div>
                                    <div class="highlight-label">Design</div>
                                    <div class="highlight-count">9 posts</div>
                                </div>
                            </div>
                        </section>

                        <!-- Feed de Postagens -->
                        <section class="feed-section">
                            <div class="feed-tabs">
                                <div class="feed-tab active">Postagens</div>
                                <div class="feed-tab">Fotos</div>
                                <div class="feed-tab">Vídeos</div>
                            </div>

                            <!-- Post 1 -->
                            <div class="post-item">
                                <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Avatar" class="post-avatar">
                                <div class="post-content">
                                    <div class="post-header">
                                        <span class="post-author">Ana Beatriz</span>
                                        <span class="post-time">• 2h atrás</span>
                                    </div>
                                    <div class="post-text">
                                        Acordar cedo, fotografar o nascer do sol e tomar um café ouvindo música boa. 🌅📸☕ Comecei o dia com energia!
                                    </div>
                                    <img src="https://images.unsplash.com/photo-1507525425510-2e3e3933a9a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Post image" class="post-image">
                                    <div class="post-actions">
                                        <div class="post-action"><i class="bi bi-heart"></i> <span>45</span></div>
                                        <div class="post-action"><i class="bi bi-chat"></i> <span>12</span></div>
                                        <div class="post-action"><i class="bi bi-share"></i> <span>5</span></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Post 2 -->
                            <div class="post-item">
                                <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Avatar" class="post-avatar">
                                <div class="post-content">
                                    <div class="post-header">
                                        <span class="post-author">Ana Beatriz</span>
                                        <span class="post-time">• ontem</span>
                                    </div>
                                    <div class="post-text">
                                        Novo projeto de design no ar! Muito feliz com o resultado final. Quem aí também ama criar coisas novas? 🎨✨
                                    </div>
                                    <div class="post-actions">
                                        <div class="post-action"><i class="bi bi-heart"></i> <span>89</span></div>
                                        <div class="post-action"><i class="bi bi-chat"></i> <span>23</span></div>
                                        <div class="post-action"><i class="bi bi-share"></i> <span>8</span></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Post 3 -->
                            <div class="post-item">
                                <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Avatar" class="post-avatar">
                                <div class="post-content">
                                    <div class="post-header">
                                        <span class="post-author">Ana Beatriz</span>
                                        <span class="post-time">• 3 dias atrás</span>
                                    </div>
                                    <div class="post-text">
                                        Dica de fotografia: aproveitem a "golden hour" para fotos incríveis! A luz natural faz toda diferença. 📸✨
                                    </div>
                                    <img src="https://images.unsplash.com/photo-1516035069371-29a1b244cc32?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Post image" class="post-image">
                                    <div class="post-actions">
                                        <div class="post-action"><i class="bi bi-heart"></i> <span>156</span></div>
                                        <div class="post-action"><i class="bi bi-chat"></i> <span>34</span></div>
                                        <div class="post-action"><i class="bi bi-share"></i> <span>12</span></div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>