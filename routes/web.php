<?php



Route::group(array('prefix' => 'api','middleware' => 'cors'), function()
{

  Route::get('/', function () {
      return response()->json(['message' => ' API do Danilo', 'status' => 'Connected']);;
  });

  
  	Route::resource('produtos', 'ProdutosController');
  	Route::resource('usuarios', 'UsuariosController');
  	Route::resource('retiradas', 'RetiradasController');
  
  
});




Route::get('/',  function () {
    return redirect('api');
});
Route::get('/teste', ['middleware' => 'cors', function () {
    return 'hello friends';
}]);