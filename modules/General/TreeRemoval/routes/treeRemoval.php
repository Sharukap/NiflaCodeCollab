<?php

use TreeRemoval\Http\Controllers\TreeRemovalController;

Route::get('/home', [TreeRemovalController::class, 'home'])->name('treeremoval.home');

Route::get('/form', [TreeRemovalController::class, 'openForm']);

Route::post('/save', [TreeRemovalController::class, 'save']);

Route::get('/show/{id}', [TreeRemovalController::class, 'show']);