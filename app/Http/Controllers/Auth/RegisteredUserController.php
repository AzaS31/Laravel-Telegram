<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Mail\Welcome;
use Illuminate\Support\Facades\Mail;
use Telegram\Bot\Laravel\Facades\Telegram;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
        Telegram::sendMessage([
            'chat_id' => env('TELEGRAM_CHAT_ID'), // Укажи свой chat_id в .env
            'text' => "🔔 Новый пользователь зарегистрирован!\n\n👤 *Имя:* " . $user->name . "\n📧 Email: " . $user->email,
            'parse_mode' => 'Markdown',
            'disable_web_page_preview' => true,
            'disable_notification' => false,
        ]);
    
        Mail::to($user->email)->send(new Welcome($user));
    
        return redirect(route('dashboard', absolute: false));
    }
}
