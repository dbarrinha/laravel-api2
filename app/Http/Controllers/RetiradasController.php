<?php

namespace App\Http\Controllers;
use App\Retirada;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RetiradasController extends Controller
{
    public function index()
    {
        $retiradas = Retirada::all();

        foreach($retiradas as $retirada){
		   $retirada->produto;
		   $retirada->usuario;
		}

        return response()->json($retiradas);
    }

    public function show($id)
    {
        $retiradas = Retirada::where('usuario_id','=',$id)->get();
		foreach($retiradas as $retirada){
           $retirada->produto;
           $retirada->usuario;
        }
		

        return response()->json($retiradas);
    }

    public function store(Request $request)
    {
        $retirada = new Retirada();
        $retirada->fill($request->all());
        $retirada->save();

        return response()->json($retirada, 201);
    }

     public function update(Request $request, $id)
    {
        $retirada = Retirada::find($id);

        if(!$retirada) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $retirada->fill($request->all());
        $retirada->save();

        return response()->json($retirada);
    }

    public function destroy($id)
    {
        $retirada = Retirada::find($id);

        if(!$retirada) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $retirada->delete();
    }


}
