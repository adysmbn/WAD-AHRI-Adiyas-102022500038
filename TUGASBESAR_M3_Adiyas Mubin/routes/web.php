<?php

use App\Http\Controllers\KamarController;

Route::get('/', function () {
    return redirect()->route('kamar.index');
});

Route::resource('kamar', KamarController::class);
