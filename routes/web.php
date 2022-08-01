<?php

use App\Http\Controllers\ZipCodeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('zip-codes/import', function() {
    return view('importZipCode');
});

Route::post('/import', [ZipCodeController::class, 'import']);