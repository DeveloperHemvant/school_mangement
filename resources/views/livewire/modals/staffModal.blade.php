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
                    <form wire:submit.prevent="save" class="mb-4 max-w-lg mx-auto p-4 bg-white shadow-md rounded-lg" autocomplete="off">
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div class="col-span-2">
                                <x-common.selecttag 
                                    name="Role" 
                                    label="Role:" 
                                    labelclass="block text-gray-700 font-bold mb-2" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                                    model="roleid" 
                                    :options="$role" />
                                @error('roleid')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div>
                                <x-common.input name="name" label="Name:" labelclass="block text-gray-700  font-bold mb-2" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" type="text" model="name"/>
                                @error('name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                
                            <div>
                                <x-common.input name="email" label="Email:" labelclass="block text-gray-700  font-bold mb-2" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 
                                focus:border-transparent" type="email" model="email"/>
                                @error('email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div>
                                <x-common.input name="password" label="Password:" labelclass="block text-gray-700  font-bold mb-2" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 
                                focus:border-transparent" type="password" model="password"/>
                                @error('password')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div>
                                <x-common.input name="phone" label="Phone:" labelclass="block text-gray-700  font-bold mb-2" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 
                                focus:border-transparent" type="tel" model="phone"/>
                                @error('phone')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                
                          
                        </div>
                        
                        <div class="mb-4">
                            <label for="address" class="block text-gray-700 font-bold mb-2">Address:</label>
                            <textarea id="address" name="address" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 
                                focus:border-transparent" rows="4" wire:model="address"></textarea>
                            @error('address')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="flex items-center justify-end">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Save
                            </button>
                        </div>
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
