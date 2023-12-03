<?php

namespace App\Livewire;

use Livewire\Component;

class LoginForm extends Component
{

    public $name;
    public $password;

    public function logar()
    {
        dd("Oi");
    }

    public function render()
    {
        return view('livewire.login-form');
    }
}
