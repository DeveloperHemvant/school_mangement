<?php

namespace App\Livewire\Classes;

use App\Models\standard;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Attributes\On;

#[Title('Class')]
class Classes extends Component
{
    public $showAddForm = false;
    public $id;
    public $showEditForm = false;
    public $name;
    public  $classId;

    public function toggleAddForm()
    {
        $this->showAddForm = !$this->showAddForm;
        $this->showEditForm = false;
    }
    public function save(){
        $this->validate([
            'name' => 'required|string|max:255|unique:standards', // Ensure the name is unique in the class_names table
        ]);

        standard::create([
            'name' => $this->name,
        ]);
        $this->dispatch('save');
        $this->showAddForm=false;
        $this->resetForm();
    }
    public function edit($id)
    {
        $this->showAddForm = false;
        $user = standard::findOrFail($id);
        $this->id = $id;
        
        $this->name = $user->name;
        
       
        $this->showEditForm = true;
    }
    public function update()
    {
        $standard = standard::findOrFail($this->id);
        if ($this->name != $standard->name) {
            $validatedData = $this->validate([
                'name' => 'required|string|max:255|unique:standards', 
            ]);
            $standard->name = $validatedData['name'];
        } else {
            $validatedData = ['name' => $this->name];
        }
        $this->dispatch('updateclass');
        $standard->save();
        $this->showEditForm=false;
        $this->resetForm();
    }
    private function resetForm()
    {
        $this->name = ''; 
    }
    public function confirmDelete($id)
    {
        $this->classId=$id;
        $this->dispatch('delete');
        
    }
    #[On('goOn-Delete')]
    public function delete()
    {
        $std=standard::findOrFail($this->classId);
        $std->delete();
        $this->dispatch('deleteclass');
    }
    public function restore()
    {
        standard::onlyTrashed()->restore();
        $this->dispatch('restore');
       
    }
    public function render()
    {
        $data=standard::all();
        return view('livewire.classes.classes',['data'=>$data]);
    }
}
