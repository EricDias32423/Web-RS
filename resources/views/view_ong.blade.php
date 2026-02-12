<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="inicial.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="visualiza.js"></script>
    <title>Vizualizador de Ong</title>
    <style>
        body {
            background: linear-gradient(90deg, #4f439bc7, #360a4f);
            display: flex;
            justify-content: center;
            /* Centraliza horizontalmente */
            align-items: center;
            /* Centraliza verticalmente */
            height: 100vh;
            /* Altura total da tela */
            margin: 0;
            /* Remove margem padrão */
             font-family: 'Poppins', sans-serif;
        }

        #descricao {
            color: rgb(0, 136, 255);
            align-items: center;
            content:
        }

        button {
            color: blueviolet;
            background-color: aquamarine;
            border-radius: 15px
        }

        input {
            background-color: bisque;
            border-radius: 15px
        }

        #tent {
            background-color: azure;
            display: flex;
            border-radius: 45px;
            width: 550px;
            height: 300px;
            align-content: center;

        }
    </style>
</head>

<body>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <input type="text" id="nome" hidden value="{{$id_ong}}">
    <div class="container" id="tent">
        <h1 id="descricao">Cadastre sua Ong Aqui!</h1>
        <div class="row mt-4">
            <div class="col-lg-7 col-md-7 col-sm-12">
                <label id="descricao" for="">Nome da Ong</label>
                <br>
                <input type="text" id="nome" >
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12">
                <label id="descricao" for="">Email</label>
                <br>
                <input type="text" id="email">
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12">
                <label id="descricao" for="">Descrição</label>
                <br>
                <input type="text" id="descrição">
            </div>

            <div>
                <br>
                <button type="submit" id="lkz">Cadastrar</button>
            </div>

        </div>
    </div>
</body>

</html>
    