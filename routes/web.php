<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JenisLimbahController;


Route::get('/', function () {
    return view('dashboard');
});

Route::resource('jenis-limbah', JenisLimbahController::class)
    ->except('show')
    ->parameters(['jenis-limbah' => 'jenisLimbah']);