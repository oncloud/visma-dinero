<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web']], function () {
    Route::get('dinero', function () {
        echo 'Hello from the dinero package!';
    });
});
