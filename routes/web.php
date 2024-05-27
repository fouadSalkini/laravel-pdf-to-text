<?php

use App\Http\Controllers\DefaultController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    $text = 'hello world';
    return view('welcome', compact('text'));
});
Route::get('/pdf', [DefaultController::class, 'pdf']);
