<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ong;

class OngController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ------------------------  API (JSON)  ----------------------------------
    |--------------------------------------------------------------------------
    */

    // TESTE
    public function envia_test()
    {
        return response()->json([
            'status' => 'API ONG funcionando'
        ], 200);
    }

    // LISTAR TODAS
    public function todas_ongs()
    {
        return response()->json([
            'erro' => 'n',
            'ongs' => Ong::all()
        ], 200);
    }

    // EXIBIR UMA
    public function exibe_ong($id)
    {
        $ong = Ong::find($id);

        if (!$ong) {
            return response()->json([
                'erro' => 'ONG não encontrada'
            ], 404);
        }

        return response()->json([
            'erro' => 'n',
            'ong' => $ong
        ], 200);
    }

    // INSERIR
    public function salva_ong(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:ongs,email',
            'descricao' => 'nullable|string'
        ]);

        $ong = Ong::create($request->only([
            'nome',
            'email',
            'descricao'
        ]));

        return response()->json([
            'msg' => 'ONG cadastrada com sucesso',
            'ong' => $ong
        ], 201);
    }

    // ATUALIZAR
    public function atualizar_ong(Request $request, $id)
    {
        $ong = Ong::find($id);

        if (!$ong) {
            return response()->json([
                'erro' => 'ONG não encontrada'
            ], 404);
        }

        $request->validate([
            'nome' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:ongs,email,' . $id,
            'descricao' => 'nullable|string'
        ]);

        $ong->update($request->only([
            'nome',
            'email',
            'descricao'
        ]));

        return response()->json([
            'msg' => 'ONG atualizada com sucesso',
            'ong' => $ong
        ], 200);
    }

    /*
    |--------------------------------------------------------------------------
    | ------------------------  VIEWS (BLADE)  --------------------------------
    |--------------------------------------------------------------------------
    */

    // LISTA
    public function index()
    {
        $ongs = Ong::all();
        return view('lista_ongs', compact('ongs'));
    }

    // TELA DE CADASTRO
    public function create_view()
    {
        return view('create');
    }

    // VISUALIZAR
    public function view_ong($id)
    {
        $ong = Ong::findOrFail($id);
        return view('view_ong', compact('ong'));
    }

    // EDITAR
    public function alt($id)
    {
        $ong = Ong::findOrFail($id);
        return view('alt_ong', compact('ong'));
    }

    // VIEW CONFIRMAÇÃO DELETE
    public function delete_view($id)
    {
        $ong = Ong::findOrFail($id);
        return view('delete_ong', compact('ong'));
    }

    // DELETE DEFINITIVO
    public function destroy($id)
    {
        $ong = Ong::findOrFail($id);

        $ong->delete();

        return redirect()
                ->route('lista_ongs')
                ->with('sucesso', 'ONG excluída com sucesso');
    }
}
