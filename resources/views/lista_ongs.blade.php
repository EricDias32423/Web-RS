<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de ONGs</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            font-family: 'Poppins', sans-serif;
            padding: 60px 0;
        }

        .card-custom {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.12);
        }

        .titulo {
            font-weight: 600;
            color: #4f46e5;
        }

        .btn-rounded {
            border-radius: 30px;
        }

        .table thead {
            background-color: #4f46e5;
            color: white;
        }

        .table-hover tbody tr:hover {
            background-color: #f3f4f6;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="card-custom">

        {{-- Header com botão --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="titulo m-0">Lista de ONGs</h2>

            <a href="/ongs/create" class="btn btn-success btn-rounded">
                <i class="bi bi-plus-circle"></i> Nova ONG
            </a>
        </div>

        {{-- Mensagem de sucesso --}}
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

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Descrição</th>
                        <th width="220">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ongs as $ong)
                    <tr>
                        <td>{{ $ong->id }}</td>
                        <td class="fw-semibold">{{ $ong->nome }}</td>
                        <td>{{ $ong->email }}</td>
                        <td>{{ $ong->descricao ?? 'Não informada' }}</td>
                        <td>

                            <a href="/ongs/{{ $ong->id }}"
                               class="btn btn-info btn-sm btn-rounded">
                                <i class="bi bi-eye"></i>
                            </a>

                            <a href="/ongs/{{ $ong->id }}/edit"
                               class="btn btn-primary btn-sm btn-rounded">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <form action="{{ route('ong.destroy', $ong->id) }}"
                                  method="POST"
                                  style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="btn btn-danger btn-sm btn-rounded"
                                        onclick="return confirm('Tem certeza que deseja excluir?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @endif

    </div>
</div>

</body>
</html>