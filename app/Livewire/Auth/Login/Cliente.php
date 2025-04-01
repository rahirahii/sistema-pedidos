<?php

namespace App\Livewire\Auth\Login;


=======
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class Cliente extends Component
{

=======
    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6'
    ];

    protected $messages = [
        'email.required' => 'email obrigatório',
        'email.email' => 'o formato de email é inválido',
        'password.required' => 'senha obrigatória',
        'password.min' => 'a senha deve conter no mínimo 6 caracteres'
    ];

    public function login()
    {
        $this->validate();
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->regenerate();
        }

        if (Auth::user()->role === 'cliente') {
            return redirect()->route('cliente.dashboard');
        }

        if (Auth::user()->role === 'funcionario') {
            return redirect()->route('funcionario.dashboard');
        }

        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin');
        }

        session()->flash('error', 'email ou senha incorretos');
    }


    public function render()
    {
        return view('livewire.auth.login.cliente');
    }
}
