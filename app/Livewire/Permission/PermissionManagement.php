<?php

namespace App\Livewire\Permission;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Livewire\Attributes\Title;
#[Title('Permission')]
class PermissionManagement extends Component
{
    public $permissions;
    public $permissionName;

    public function mount()
    {
        $this->permissions = Permission::all();
    }

    public function createPermission()
    {
        $this->validate([
            'permissionName' => 'required|string|max:255',
        ]);

        Permission::create(['name' => $this->permissionName]);
        $this->permissionName = '';
        $this->permissions = Permission::all();
    }
    public function deletePermission($id){
        $permission = Permission::find($id);
        $permission->delete();
        $this->refresh();
    }
    public function refresh(){
        $this->permissions =Permission::all();
    }
    public function render()
    {
        return view('livewire.permission.permission-management');
    }
}
