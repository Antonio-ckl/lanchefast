<?php

use App\Livewire\Cliente\Create;
use App\Livewire\Cliente\Edit;
use App\Livewire\Cliente\Index;
use App\Livewire\Cliente\show;
use Illuminate\Support\Facades\Route;

Route::prefix('clientes')->group(function(){
    Route::get('/', App\Livewire\Cliente\Index::class)->name('cliente.index');
    Route::get('/create', App\Livewire\Cliente\Create::class)->name('cliente.create');
    Route::get('/{id}', App\Livewire\cliente\show::class)->name('cliente.show');
    Route::get('/{id}/edit', App\Livewire\Cliente\Edit::class)->name('cliente.edit');
});

Route::prefix('produtos')->group(function () {
    Route::get('/', App\Livewire\Produto\Index::class)->name('produto.index');
    Route::get('/create', App\Livewire\Produto\Create::class)->name('produto.create');
    Route::get('/{produto}', App\Livewire\Produto\Show::class)->name('produto.show');
    Route::get('/{produto}/edit', App\Livewire\Produto\Edit::class)->name('produto.edit');
});