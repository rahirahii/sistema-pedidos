<?php

use App\Livewire\Cliente\Create;
use Illuminate\Support\Facades\Route;

Route::get('/cadastro/cliente', Create::class);

use App\Livewire\Auth\Login\Cliente as Login;
use App\Livewire\Cliente\Create;
use Illuminate\Support\Facades\Route;

// create
Route::get('/create/cliente', Create::class);

// index

//login
Route::get('/login', Login::class);

