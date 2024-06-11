<?php

namespace App\Livewire\Parents;
use Livewire\Attributes\Title;
use Livewire\Component;

class PLogin extends Component
{
    public $email;
    public $password;
    #[Title('Parents Login')] 
    public function loginuser(){
        dd($this->email);
    }
    public function render()
    {
        return view('livewire.parents.p-login');
    }
}
