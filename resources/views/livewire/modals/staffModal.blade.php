<div x-data="{ open: @entangle('showAddForm') }">
    <!-- Livewire modal -->
    <div x-show="open" class="fixed inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" x-show="open"
                x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>
            
            <!-- Modal -->
            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-3/4 lg:w-1/2"
                role="dialog" aria-modal="true" aria-labelledby="modal-headline" x-show="open"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                <!-- Modal content -->
              
                <div class="px-6 py-4">
                    <h1 class="text-3xl font-bold mb-4">Role Management</h1>
                    <form wire:submit.prevent="createRole" class="mb-4">
                        <div class="flex mb-4">
                            <input type="text" class="flex-1 mr-2 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Enter role name" wire:model="roleName">
                        </div>
                        <div class="mb-4">
                            <h2 class="font-bold mb-2">Assign Permissions:</h2>
                            @foreach ($permissions as $permission)
                                <div class="flex items-center mb-2">
                                    <input type="checkbox" wire:model="selectedPermissions" value="{{ $permission->id }}" class="mr-2">
                                    <label>{{ $permission->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        <button class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600" type="submit">Create Role</button>
                    </form>
                </div>
                
                <div class="px-6 py-4 bg-gray-100 border-t border-gray-200 flex justify-end">
                    <button type="button" @click="showAddForm = false" wire:click="toggleAddForm"
                        class="text-gray-600 mr-4">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('deleteClass', function() {
        const message = event.detail[0].message;
        // console.log(event);
        Swal.fire({
            position: "top-end",
            icon: "warning",
            title: message,
            showConfirmButton: false,
            timer: 3000
        });
    });
</script>
