<?php


namespace App\Http\Controllers;


use App\Serie;
use http\Env\Response;
use Illuminate\Http\Request;

class SeriesController
{
    public function index()
    {
        return Serie::all();
    }

    public function store(Request $request)
    {
//        var_dump($request->nome);
//        exit();
        //$nome = $request->nome;
        //$dados = Serie::create(['nome' => $nome]);

        return response()
            ->json(
//                Serie::create(['nome' => $request->nome]),
                Serie::create($request->all()),
                201
            );
    }

    public function show(int $id)
    {
        $serie = Serie::find($id);

        if(is_null($serie)) {
            return response()->json('', 204);
        }

        return response()->json($serie);
    }

    public function update(int $id, Request $request)
    {
        $serie = Serie::find($id);
        if(is_null($serie)) {
            return response()->json([
                'erro' => 'Recurso não encontrado'
            ], 404);
        }
        $serie->fill($request->all());
        $serie->save();

        return $serie;
    }

    public function destroy(int $id)
    {
        $qtdRecursosRemovidos = Serie::destroy($id);
        if (is_null($qtdRecursosRemovidos === 0)) {
            return response()->json([
                'erro' => 'Recurso não encontrado'
            ], 404);
        }

        return response()->json('', 204);
    }
}
