<div>
    <!-- Life is available only in the present moment. - Thich Nhat Hanh -->
</div>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar ONG</title>

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
            color: rgb(0, 136, 255);
        }

        .label {
            font-weight: bold;
            color: #360a4f;
        }

        .valor {
            background-color: bisque;
            padding: 8px;
            border-radius: 10px;
        }
    </style>
</head>

<body>

<div class="container card-custom">

    <h1 class="titulo text-center mb-4">Detalhes da ONG</h1>

    <div class="mb-3">
        <div class="label">Nome:</div>
        <div class="valor">{{ $ong->nome }}</div>
    </div>

    <div class="mb-3">
        <div class="label">Email:</div>
        <div class="valor">{{ $ong->email }}</div>
    </div>

    <div class="mb-3">
        <div class="label">Descrição:</div>
        <div class="valor">{{ $ong->descricao ?? 'Não informada' }}</div>
    </div>

</div>

</body>
</html>
