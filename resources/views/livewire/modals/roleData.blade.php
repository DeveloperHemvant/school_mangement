<div x-data="{ open: @entangle('showRoleData') }">
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
                    <div class="flex justify-between items-center mb-4">
                        <h1 class="text-3xl font-bold">Role Details</h1>
                        <button @click="showRoleData = false" wire:click="toggleRoleData" class="text-gray-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    @if($roleData)
                        <div>
                            <h2 class="font-bold mb-2">Role Name: {{ $roleData->name }}</h2>
                            <h3 class="font-semibold mb-2">Permissions:</h3>
                            <ul>
                                @foreach($roleData->permissions as $index => $permission)
                                    <li class="flex items-center justify-between {{ $index % 2 === 0 ? 'bg-gray-100' : 'bg-gray-200' }}">
                                        <span>{{ $permission->name }}</span>
                                        <button wire:click="deletePermission({{ $permission->id }})" class="text-red-500">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                
                
                
                <div class="px-6 py-4 bg-gray-100 border-t border-gray-200 flex justify-end">
                    <button type="button" @click="showRoleData = false" wire:click="toggleRoleData"
                        class="text-gray-600 mr-4">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
