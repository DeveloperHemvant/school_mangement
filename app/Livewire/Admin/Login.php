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
    public function guard()
    {
     return Auth::guard('admin');
    }
    public function login()
    {
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect('admin/dashboard');
        } else {
            dd("login failed");
        }
    }
    
    public function render()
    {
        return view('livewire.admin.login');
    }
}
