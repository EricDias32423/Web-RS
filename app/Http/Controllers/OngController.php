<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ong;

class OngController extends Controller
{
    public function envia_test(Request $request)
    {
        return response()->json([
            'status' => 'API ONG funcionando'
        ], 200);
    }

    public function salva_ong(Request $request)
{
    $request->validate([
        'nome' => 'required',
        'email' => 'required|email|unique:ongs',
        'descricao' => 'nullable'
    ]);

    $ong = Ong::create([
        'nome' => $request->nome,
        'email' => $request->email,
        'descricao' => $request->descricao
    ]);

    return response()->json([
        'msg' => 'ONG cadastrada com sucesso',
        'ong' => $ong
    ], 201);
}
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

    public function todas_ongs()
    {
        return response()->json([
            'erro' => 'n',
            'ongs' => Ong::all()
        ], 200);
    }
}
