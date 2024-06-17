<?php

namespace App\Livewire\Permission;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Livewire\Attributes\Title;
#[Title('Roles')]
class RoleManagement extends Component
{
    

    public $showAddForm = false;
    public $showRoleData = false;
    public $rolePermissions = [];
    public $selectedPermissions;
    public $updatedPermissions = [];
    // public $selectedPermissions;
    public $roles;
    public $permissions;
    public $roleName;
    public $roleData;
    public $role_id;
    public $editrole;
    public function toggleAddForm()
    {
        $this->showAddForm = !$this->showAddForm;
        $this->showEditForm = false;
    }
    public function toggleRoleData()
    {
        $this->showRoleData = !$this->showRoleData;

    }
    public function mount()
    {
        $this->roles = Role::all();
        $this->permissions = Permission::all();
    }
    public function createRole()
    {
        $validatedData = $this->validate([
            'roleName' => 'required|string|max:255',
        ]);
        $role = Role::create(['name' => $this->roleName]);
        $permissions = Permission::pluck('id')->toArray();
        $role->permissions()->sync($permissions);
        $this->roleName = '';
        //$this->selectedPermissions = [];
        $this->showAddForm = false;
        $this->refreshdata();
        session()->flash('message', 'Role created and all permissions assigned successfully.');
    }
    public function showDetailsModal($id)
    {
        $this->showRoleData = true;
        $this->role_id = $id;
        $this->roleData = Role::with('permissions')->find($id);
    }
    public function editRole($id)
    {
        $this->showAddForm = true;
        $this->editrole = Role::with('permissions')->find($id);
        // dd($this->editrole->permissions);
        $this->role_id = $id;
        $this->roleName = $this->editrole->name;
        $this->selectedPermissions = Permission::all();
        // dd($this->selectedPermissions);

    }
    public function deletePermission($p_id)
    {
        $role = Role::find($this->role_id);
        $role->permissions()->detach($p_id);
    }
    public function updateRole(){
        $roleId=$this->role_id;
        $roleUpdated = Role::find($roleId);
        // dd($roleUpdated);
        $roleUpdated->permissions()->sync($this->selectedPermissions);
        $this->showAddForm = false;

    }
    public function refreshdata()
    {
        $this->roles = Role::all();
        $this->permissions = Permission::all();
    }
    public function deleteRole($roleId)
    {
        $role = Role::find($roleId);
        $role->delete();
        $this->roles = Role::all();
        session()->flash('message', 'Role deleted successfully.');
    }
    public function render()
    {
        return view('livewire.permission.role-management');
    }
}
