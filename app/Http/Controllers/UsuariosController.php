<?php

namespace App\Http\Controllers;
use App\Usuario;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return response()->json($usuarios);
    }

    public function show($id)
    {
        $usuario = Usuario::find($id);

        if(!$usuario) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        return response()->json($usuario);
    }

    public function store(Request $request)
    {
        $usuario = new Usuario();
        $usuario->fill($request->all());
        $usuario->save();

        return response()->json($usuario, 201);
    }

     public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);

        if(!$usuario) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $usuario->fill($request->all());
        $usuario->save();

        return response()->json($usuario);
    }

    public function destroy($id)
    {
        $usuario = Usuario::find($id);

        if(!$usuario) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $usuario->delete();
    }

    public function login(Request $request)
    {   
        $usuario = Usuario::where('usuario','=',$request->input('usuario'))->where('senha','=',$request->input('senha'))->get();

        
        if(count($usuario) == 0) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }
        else{
            return response()->json($usuario,200);
        }

        
    }
}
