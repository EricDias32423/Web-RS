<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <title>Alterar ONG</title>

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

        #card {
            background-color: azure;
            border-radius: 30px;
            width: 500px;
            padding: 30px;
        }
    </style>
</head>

<body>

    <!-- ID oculto -->
    <input type="hidden" id="ong_id" value="{{ $ong->id }}">

    <div class="container" id="card">

        <h2 class="text-center mb-4">Alterar ONG</h2>

        <div class="mb-3">
            <label>Nome da ONG</label>
            <input type="text"
                   id="nome"
                   class="form-control"
                   value="{{ $ong->nome }}">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="text"
                   id="email"
                   class="form-control"
                   value="{{ $ong->email }}">
        </div>

        <div class="mb-3">
            <label>Descrição</label>
            <input type="text"
                   id="descricao"
                   class="form-control"
                   value="{{ $ong->descricao }}">
        </div>

        <div class="text-center">
            <button type="button"
                    id="btnAtualizar"
                    class="btn btn-primary">
                Atualizar
            </button>
        </div>

    </div>

<script>
$(document).ready(function () {

    $("#btnAtualizar").click(function () {

        let id = $("#ong_id").val();

        $.ajax({
            url: "/api/ongs/" + id,
            type: "PUT",
            data: {
                nome: $("#nome").val(),
                email: $("#email").val(),
                descricao: $("#descricao").val(),
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function () {
                alert("ONG atualizada com sucesso!");
                window.location.href = "/ongs";
            },
            error: function (xhr) {
                alert("Erro ao atualizar.");
                console.log(xhr.responseText);
            }
        });

    });

});
</script>

</body>
</html>
