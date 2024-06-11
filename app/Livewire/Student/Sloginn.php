<?php

namespace App\Livewire\Student;
use Livewire\Attributes\Title;
use Livewire\Component;

class Sloginn extends Component
{
    #[Title('Student Login')] 
    public function render()
    {
        return view('livewire.student.sloginn');
    }
}
