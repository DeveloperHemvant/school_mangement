<div x-app title="Roles">
    <x-slot name="navigation">
        <x-adminnavigation title="All Roles"/>
    </x-slot>
    <x-slot name="header">
        <!-- Add any header content here if needed -->
    </x-slot>
    <div class="container mx-auto px-4 py-8">
        <button
            style="background-color: #1e40af; color: #ffffff; font-weight: bold; padding: 0.5rem 1rem; border-radius: 0.25rem; border: none; outline: none; cursor: pointer; transition: background-color 0.3s ease;"
            wire:click="toggleAddForm"
            class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded mb-4">
            {{ $showAddForm ? 'Cancel' : 'Add Role' }}
        </button>
        <h1 class="text-3xl font-bold mb-4">Role Management</h1>

        <div class="flex">
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Role Name</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td class="border px-4 py-2">{{ $role->name }}</td>
                            <td class="border px-4 py-2">
                                <button
                                    class="px-4 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400 mr-2"
                                    wire:click="showDetailsModal({{ $role->id }})">
                                    <i class="fa-solid fa-info"></i>
                                </button>
                                <button
                                    class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 mr-2"
                                    wire:click="editRole({{ $role->id }})">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>
                                <button
                                    class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600"
                                    wire:click="deleteRole({{ $role->id }})">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('livewire.modals.addrole')
    @include('livewire.modals.roleData')
</div>
