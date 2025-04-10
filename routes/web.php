<?php

use App\Livewire\Cliente\Create;
use App\Livewire\Cliente\Edit;
use App\Livewire\Cliente\Index;
use App\Livewire\Cliente\Show;
use Illuminate\Support\Facades\Route;

Route::prefix('clientes')->group(function(){
    Route::get('/', App\Livewire\Cliente\Index::class)->name('cliente.index');
    Route::get('/create', App\Livewire\Cliente\Create::class)->name('cliente.create');
    Route::get('/{cliente}', App\Livewire\Cliente\Show::class)->name('cliente.show');
    Route::get('/{cliente}/edit', App\Livewire\Cliente\Edit::class)->name('cliente.edit');
});