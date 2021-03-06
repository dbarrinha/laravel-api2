<?php

namespace App\Http\Controllers;
use App\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{


    public function index()
    {
        $produtos = Produto::all();
        return response()->json($produtos);
    }

    public function show($id)
    {
        $produto = Produto::find($id);

        if(!$produto) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        return response()->json($produto);
    }

    public function store(Request $request)
    {
        $produto = new Produto();
        $produto->fill($request->all());
        $produto->save();

        //retornando a lista completa para facilitar visualização na aplicação react
        $produtos = Produto::all();
        return response()->json($produtos, 201);
    }

     public function update(Request $request, $id)
    {
        $produto = Produto::find($id);

        if(!$produto) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $produto->fill($request->all());
        $produto->save();


        return response()->json($produto);
    }

    public function destroy($id)
    {
        $produto = Produto::find($id);

        if(!$produto) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $produto->delete();
    }
}
