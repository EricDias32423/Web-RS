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
</head>

<body>
    <!-- Sidebar fixa -->
    <aside class="side-bar">
        <div class="side-logo">
            <span>website</span>
        </div>

        <ul class="side-menu">

        </ul>

        <div class="side-footer">

        </div>
    </aside>

    <!-- Conteúdo principal -->
    <div class="container">

        <div class="row">

            <div class="profile">
                <!-- Capa do Perfil -->
                <div class="profile-avatar">
                    <!-- Foto do perfil (avatar) -->
                    <div class="profile-avatar-foto">

                    </div>
                </div>

                <!-- Informações do perfil/ Status  -->
                <div class="profile-inf">
                    <div class="profile-inf-secion">
                        <!-- Nome/Bio -->
                        <div class="profile-name">
                            <h1>Name</h1>
                            <div class="profile-bio">
                                Bio do Individuo
                            </div>
                        </div>

                        <!-- Status do Perfil -->
                        <div class="stats">
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
                                <i class=""></i>Editar Perfil
                            </button>
                        </div>

                        <!-- Grid de conteúdo: Sidebar info + Feed -->
                        <div class="conteudo-grid">
                            <!-- Sidebar direita (infos adicioanis da pessoa) -->
                            <div class="conteudo-saidebar">
                                <aside class="saidbar-inf">
                                    <div class="info-section">
                                        <div class="info-title">
                                            Sobre mim
                                        </div>
                                        <div class="info-item">
                                            <div class="info-icon"></i></div>
                                            <div>
                                                <small class="text-secondary">Trabalho</small>
                                                <div class="fw-semibold">Designer na Creativa</div>
                                            </div>
                                        </div>
                                        <div class="info-item">
                                            <div class="info-icon"></div>
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

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</body>

</html>
