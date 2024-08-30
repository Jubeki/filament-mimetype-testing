<?php

use App\Livewire\FileCollectionForm;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/form', FileCollectionForm::class);
