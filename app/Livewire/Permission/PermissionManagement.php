<?php

namespace App\Livewire\Permission;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
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
    public function render()
    {
        return view('livewire.permission.permission-management');
    }
}
