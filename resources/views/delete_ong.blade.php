<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Excluir ONG</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(90deg, #4f439bc7, #360a4f);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }

        .card-custom {
            background-color: azure;
            border-radius: 30px;
            width: 550px;
            padding: 30px;
        }

        .titulo {
            color: red;
        }

        .info {
            background-color: bisque;
            padding: 8px;
            border-radius: 10px;
        }
    </style>
</head>

<body>

<div class="container card-custom">

    <h1 class="titulo text-center mb-4">Confirmar Exclusão</h1>

    <p class="text-center">
        Você realmente deseja excluir esta ONG?
    </p>

    <div class="mb-3">
        <strong>Nome:</strong>
        <div class="info">{{ $ong->nome }}</div>
    </div>

    <div class="mb-3">
        <strong>Email:</strong>
        <div class="info">{{ $ong->email }}</div>
    </div>

    <div class="mb-3">
        <strong>Descrição:</strong>
        <div class="info">{{ $ong->descricao ?? 'Não informada' }}</div>
    </div>

    <form action="{{ route('ong.destroy', $ong->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">
                Cancelar
            </a>

            <button type="submit" class="btn btn-danger">
                Excluir ONG
            </button>
        </div>
    </form>

</div>

</body>
</html>

