<?php

namespace App\Livewire\Staff;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class Logins extends Component
{
    #[Title('Staff Login')] 
    public $email;
    public $password;
    public function guard()
    {
     return Auth::guard('staff');
    }
    public function login()
    {
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];
      
        $guard = 'staff';
        if (Auth::guard($guard)->attempt($credentials)) {
            session(['guard' => $guard]);
            
            return redirect('staff/dashboard');
        } else {
            dd("login failed");
        }
    }
    public function render()
    {
        return view('livewire.staff.login');
    }
}
