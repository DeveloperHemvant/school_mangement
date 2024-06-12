<div x-app title="Permission">
    <x-slot name="navigation">
        <x-adminnavigation title="All Permissions"/>
    </x-slot>
    <x-slot name="header">
        <!-- Add any header content here if needed -->
    </x-slot>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">Permission Management</h1>
        <div class="flex mb-4">
            <input type="text" class="flex-1 mr-2 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Enter permission name" wire:model="permissionName">
            <button class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600" wire:click="createPermission">Create Permission</button>
        </div>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Permission Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($permissions as $permission)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $permission->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <button class="text-red-600 hover:text-red-900" wire:click="deletePermission({{ $permission->id }})"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
