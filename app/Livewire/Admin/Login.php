<?php

namespace App\Livewire\Admin;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Hash;
use Illuminate\Contracts\Auth\Authenticatable;

class Login extends Component
{
    #[Title('Admin Login')] 
    public $email;
    public $password;
    
    public function login()
    {
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];
        $guard = 'admin';
        if (Auth::guard($guard)->attempt($credentials)) {
            session(['guard' => $guard]);
            return redirect($guard.'/dashboard');
        } else {
            dd("login failed");
        }
    }
    
    public function render()
    {
        return view('livewire.admin.login');
    }
}
