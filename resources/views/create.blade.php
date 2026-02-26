<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de ONG</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-custom {
            width: 100%;
            max-width: 500px;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
            border: none;
        }

        .title {
            font-weight: 600;
            color: #4f46e5;
        }

        .btn-custom {
            border-radius: 30px;
            padding: 10px;
            font-weight: 500;
        }

        .form-control {
            border-radius: 12px;
        }
    </style>
</head>

<body>

    <div class="card card-custom">
        <h3 class="text-center mb-4 title">Cadastre sua ONG</h3>

        <form action="{{ route('ongs.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nome da ONG</label>
                <input type="text" name="nome" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-4">
                <label class="form-label">Descrição</label>
                <textarea name="descricao" class="form-control" rows="3"></textarea>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-custom">
                    Cadastrar ONG
                </button>
            </div>
        </form>
    </div>

</body>

</html>