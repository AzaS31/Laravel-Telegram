<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Telegram\Bot\Laravel\Facades\Telegram;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/test-telegram', function () {
    Telegram::sendMessage([
        'chat_id' => env('TELEGRAM_CHAT_ID'), // Укажите свой chat_id в .env
        'text' => 'Добрый день! Это тестовое сообщение от вашего Laravel-бота. 🚀',
        'parse_mode' => 'HTML',
        'disable_web_page_preview' => true,
        'disable_notification' => false,
    ], ['http' => ['verify' => false]]); // Отключение проверки SSL

    return response()->json([
        'message' => 'Сообщение успешно отправлено в Telegram!',
    ]);
});