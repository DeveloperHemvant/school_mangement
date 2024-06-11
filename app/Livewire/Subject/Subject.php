<?php

namespace App\Livewire\Subject;

use App\Models\standard;
use Livewire\Attributes\Title;
use Livewire\Attributes\On;

use Livewire\Component;

class Subject extends Component
{
    #[Title('Subject')]
    public $data;
    public $subjectdetails;
    public $SubjectName = [];
    public $ClassName;
    public $showAddForm = false;
    public $id;
    public $class;
    public $name;
    public $showEditForm = false;
    public $showsyncForm = false;
    public $s_id;
    public $c_id;
    public $showDropdown = false;
  
    public function toggleAddSubForm()
    {
        $this->showsyncForm = !$this->showsyncForm;
    }
    public function details($s_id){
        $this->s_id = $s_id; // Set the s_id to the passed parameter
        $this->showDropdown = true; // Show the dropdown
        $subjectdetail = \App\Models\Subject::find($s_id);
        $this->subjectdetails = $subjectdetail;
    //    dd($this->subjectdetails);
    }
    public function confirmDelete($s_id){
        $this->s_id = $s_id;
        // dd($this->s_id);
        $this->dispatch('deleteClass');
        // $class = standard::find($c_id);
        // // dd($class);
        // $class->subjects()->detach($this->s_id);
    }
    #[On('goOn-Delete')]
    public function deletestandard()
    {
       $class = \App\Models\Subject::find($this->s_id);
        dd($class);
        $class->classes()->detach($this->c_id);
        $this->dispatch('delete');
    }
    public function hide()
    {
        $this->showDropdown = false;
    }
    public function toggleAddForm()
    {
        $this->showAddForm = !$this->showAddForm;
        $this->showEditForm = false;
    }
    public function mount()
    {
        $this->data = \App\Models\Subject::all();
        $this->class = standard::all();
    }
    public function save()
    {
        $validatedata = $this->validate([
            'name' => 'required|string|max:255|unique:subjects',
        ]);
        \App\Models\Subject::create([
            'name' => $this->name,
        ]);
        $this->refresh();
        $this->name = '';
        $this->showAddForm = false;
    }
    public function syncsave()
    {
        $validatedata = $this->validate([
            'SubjectName' => 'required|string|max:255',
            'ClassName' => 'required|string|max:255',
        ]);
        
        $className = standard::find($validatedata['ClassName']);
    
        // Check if the subject is already attached to the class
        if ($className->subjects()->where('subject_id', $validatedata['SubjectName'])->exists()) {
            // Subject is already attached, send a message
            session()->flash('status', 'The subject is already assigned to this class.');
        } else {
            // Subject is not attached, attach it
            $className->subjects()->syncWithoutDetaching([$validatedata['SubjectName']]);
            session()->flash('success', 'Subject has been assigned to the class successfully.');
        }
    
        // Reset form data and toggle form
        $this->reset(['ClassName', 'SubjectName']);
        $this->toggleAddSubForm();
    }
    
    public function delete($id)
    {
        $subject = \App\Models\Subject::find($id);
        $subject->delete();
        $this->refresh();
    }
    public function refresh()
    {
        $this->data = \App\Models\Subject::all();
    }
    public function render()
    {
        return view('livewire.subject.subject');
    }
}
