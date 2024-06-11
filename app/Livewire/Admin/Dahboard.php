<?php

namespace App\Livewire\Admin;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
class Dahboard extends Component
{

    #[Title('Admin Dashboard')] 
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    public function render()
    {
        return view('livewire.admin.dahboard');
    }
}
