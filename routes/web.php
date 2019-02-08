<?php


Route::middleware(['cors'])->prefix('api')->group(function()
{

  		
  Route::get('/', function () {
      return response()->json(['message' => ' API do Danilo', 'status' => 'Connected']);;
  });
  Route::post('/login', 'UsuariosController@login');

  
  	Route::resource('produtos', 'ProdutosController');
  	Route::resource('usuarios', 'UsuariosController');
  	Route::resource('retiradas', 'RetiradasController');
  
  
});



Route::get('/',  function () {
    return redirect('api');
});
Route::post('/teste', ['middleware' => 'cors', function () {
    return 'hello friends';
}]);

Auth::routes();


