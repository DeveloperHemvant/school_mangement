<?php

namespace App\Livewire\Admin;

use App\Models\Staff;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Carbon\Carbon;
#[Title('Staff')]
class Allstaff extends Component
{
    public $showAddForm = false;
    public $id;
    public $perPage=10;
    public $showEditForm = false;
    public $name;
    public $roleid;
    public $address;
    public $phone;
    public $email;
    public  $data;
    public $password;
    public $role;
    public $staff_id;
    public $search;
    public $u_search;

    public function toggleAddForm()
    {
        $this->showAddForm = !$this->showAddForm;
        
    }
    public function confirmDelete($id){
        $this->staff_id = $id;
        $this->dispatch('delete');
    }
    #[On('goOn-Delete')]
    public function delete(){
        $staff = Staff::find($this->staff_id);
        $staff->delete();
        $this->dispatch('deleteclass');
    }
    public function save(){
        $validatedData = $this->validate([
            'name'=>'required',
            'address'=>'required',
            'phone'=>'required|numeric|digits:10|unique:staff,phone_number',
            'email'=>'required|email|unique:staff,email',
            'password'=>'required|min:8'
        ]);
        
        $staff = new Staff();
        $staff->name = $validatedData['name'];
        $staff->email = $validatedData['email'];
        $staff->phone_number = $validatedData['phone'];
        // $staff->role_id = $validatedData['roleid'];
        $staff->address = $validatedData['address'];
        $staff->password = $validatedData['password'];
        $staff->created_at=Carbon::now();
        $staff->save();
        $this->dispatch('save');
        $this->toggleAddForm();
        $this->resetForm();

    }
    public function resetForm(){
        
        $this->name = '';
        $this->salary = '';
        $this->address = '';
        $this->phone = '';
        $this->email = '';

    }
    public function restore(){
        $trashedStaff = Staff::onlyTrashed()->get();
        foreach ($trashedStaff as $staff) {
            $staff->restore();
        }
        $this->dispatch('restore');
    }
    public function render()
    {
        $this->data=Staff::where(function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%');
        })->get();
        
        return view('livewire.admin.allstaff');
    }
}
