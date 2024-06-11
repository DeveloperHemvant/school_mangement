<?php

namespace App\Livewire\Staff;
use Livewire\Attributes\Title;

use Livewire\Component;

class Logins extends Component
{
    #[Title('Staff Login')] 

    public function render()
    {
        return view('livewire.staff.login');
    }
}
