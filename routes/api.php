<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// No Mpesa route here to avoid duplication
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
