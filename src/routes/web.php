<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    //トップページ（トップドメイン）にアクセスしたら入力フォーム（Vue）を表示する
    return Inertia::render('Contact/InputForm');
});

//入力画面からPOSTされたデータをFormControllerのconfirmメソッドで処理する
Route::post('/confirm', [FormController::class, 'confirm']);

Route::get('/complete', function () {
    //送信完了画面（Vue）を表示する
    return Inertia::render('Contact/Complete');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
