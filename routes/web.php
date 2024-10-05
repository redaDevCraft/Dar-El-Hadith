<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Counter;
use App\Livewire\Home;
use App\Livewire\Partials\HistoryPage;
use App\Livewire\Partials\NewsDetail;



Route::get('/', Home::class);
Route::get('/home', Home::class);


Route::get('/history', HistoryPage::class);

Route::get('/news/{id}', NewsDetail::class)->name('news.show');

Route::get('/login', function () {
    return redirect(route('filament.admin.auth.login'));
})->name('login');