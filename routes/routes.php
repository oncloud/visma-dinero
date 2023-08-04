<?php

use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/dinero/callback', function (Request $request) {
    $response = Dinero::getAccessToken($request->code);
    if (isset($response['access_token'])) {
        dd($response);
    }
    dd($request->code,$response);
})->withoutMiddleware(VerifyCsrfToken::class);
