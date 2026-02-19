<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de ONGs</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(90deg, #4f439bc7, #360a4f);
            margin: 0;
            padding: 40px 0;
            font-family: 'Poppins', sans-serif;
        }

        .card-custom {
            background-color: azure;
            border-radius: 30px;
            padding: 30px;
        }

        .titulo {
            color: rgb(0, 136, 255);
        }

        .table thead {
            background-color: #360a4f;
            color: white;
        }

        .btn-custom {
            border-radius: 15px;
            padding: 5px 15px;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card-custom">

        <h1 class="titulo text-center mb-4">Lista de ONGs</h1>

        {{-- Mensagem de sucesso após delete --}}
        @if(session('sucesso'))
            <div class="alert alert-success text-center">
                {{ session('sucesso') }}
            </div>
        @endif

        @if($ongs->isEmpty())
            <div class="alert alert-warning text-center">
                Nenhuma ONG cadastrada.
            </div>
        @else

        <table class="table table-bordered table-hover text-center align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ongs as $ong)
                <tr>
                    <td>{{ $ong->id }}</td>
                    <td>{{ $ong->nome }}</td>
                    <td>{{ $ong->email }}</td>
                    <td>{{ $ong->descricao ?? 'Não informada' }}</td>
                    <td>

                        {{-- VER --}}
                        <a href="/ongs/{{ $ong->id }}"
                           class="btn btn-info btn-sm btn-custom">
                            Ver
                        </a>

                        {{-- ALTERAR --}}
                        <a href="/ongs/{{ $ong->id }}/edit"
                           class="btn btn-primary btn-sm btn-custom">
                            Alterar
                        </a>

                        {{-- EXCLUIR --}}
                        <form action="{{ route('ong.destroy', $ong->id) }}"
                              method="POST"
                              style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="btn btn-danger btn-sm btn-custom"
                                    onclick="return confirm('Tem certeza que deseja excluir?')">
                                Excluir
                            </button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @endif

    </div>

</div>

</body>
</html>

