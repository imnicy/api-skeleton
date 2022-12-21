<?php

use Nicy\Framework\Facades\Route;


Route::group('/api', function($group) {

    $group->get('/', function() {
        return date('Y-m-d H:i:s');
    });

})->add(App\Http\Middleware\Authentication::class); // Add middleware with a class name