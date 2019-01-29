<?php

use Illuminate\Http\Request;

Route::group(array('prefix' => 'api'), function()
{

  Route::get('/teste', function () {
      return response()->json(['message' => 'Jobs API', 'status' => 'Connected']);;
  });

});

Route::get('/', function () {
    return redirect('api');
});


