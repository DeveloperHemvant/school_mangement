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
                    
                    <form wire:submit.prevent="createRole" class="mb-4">
                        <fieldset class="border border-gray-300 rounded-lg p-4 mb-4">
                            <legend class="text-xl font-bold mb-4">Profile Information</legend>
                    
                        <div>
                            <!-- Gender and Date of Birth -->
                            <div class="mb-4 flex">
                                <div class="w-1/2 mr-2">
                                    <label class="block text-gray-700 font-bold mb-2" for="gender">Select Your Gender:</label>
                                    <select wire:model="gender" id="gender" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                        <option value="">Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    @error('gender')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                    
                                <div class="w-1/2">
                                    <x-common.input 
                                        name="dob" 
                                        label=" Date of Birth:" 
                                        labelclass="block text-gray-700 font-bold mb-2" 
                                        type="date"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                                        model="dob" 
                                    />
                                    @error('dob')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4 flex">
                            <!-- Subjects -->
                                <div class="w-1/2 mr-2">
                                    <label class="block text-gray-700 font-bold mb-2" for="subjects">Select Your Subjects:</label>
                                    <select wire:model="subject" id="subject" class=" w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"  >
                                        <option value="">Select Your subject</option>
                                        @foreach ($subjects as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('subject')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="w-1/2">
                                    <x-common.input 
                                        name="adhaar" 
                                        label="Aadhaar caard no.:" 
                                        labelclass="block text-gray-700 font-bold mb-2" 
                                        type="number"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                                        model="adhaar" 
                                    />
                                    @error('adhaar')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- Classes -->
                                
                            </div>
                            <div class="mb-4 flex">
                                <div class="w-1/2 mr-2">
                                    <x-common.input 
                                        name="photo" 
                                        label="Upload Your Photo:" 
                                        labelclass="block text-gray-700 font-bold mb-2" 
                                        type="file"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                                        model="profile" 
                                    />
                                    @error('profile')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="w-1/2">
                                    <x-common.input 
                                        name="phone" 
                                        label="Phone no.:" 
                                        labelclass="block text-gray-700 font-bold mb-2" 
                                        type="number"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                                        model="phone" 
                                    />
                                    @error('phone')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                               
                            </div>
                        </div>
                    
                
                    <div>
                        <!-- Gender and Date of Birth -->
                        
                        <div class="mb-4 flex">
                        <!-- Subjects -->
                            <div class="w-1/2 mr-2">
                                <x-common.input 
                                name="matric" 
                                label=" 10th Makrsheet:" 
                                labelclass="block text-gray-700 font-bold mb-2" 
                                type="file"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                                model="matric" 
                            />
                                @error('matric')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                    
                            <!-- Classes -->
                            <div class="w-1/2">
                                <x-common.input 
                                    name="higher" 
                                    label="12th Marksheet:" 
                                    labelclass="block text-gray-700 font-bold mb-2" 
                                    type="file"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                                    model="higher" 
                                />
                                @error('higher')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 flex">
                            <!-- Subjects -->
                                <div class="w-1/2 mr-2">
                                    <x-common.input 
                                    name="graduation" 
                                    label=" Graduation:" 
                                    labelclass="block text-gray-700 font-bold mb-2" 
                                    type="file"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                                    model="graduation" 
                                />
                                    @error('graduation')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                        
                                <!-- Classes -->
                                <div class="w-1/2">
                                    <x-common.input 
                                        name="mastergraduation" 
                                        label="Master:" 
                                        labelclass="block text-gray-700 font-bold mb-2" 
                                        type="file"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                                        model="mastergraduation" 
                                    />
                                    @error('mastergraduation')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full">
                                <label class="block text-gray-700 font-bold mb-2" for="bio">Address:</label>
                                <textarea wire:model="address" id="bio" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" rows="4"></textarea>
                                @error('bio')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                    </div>
                </fieldset>
                        <button class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600" type="submit">Update</button>
                    </form>
                
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
        Swal.fire({
            position: "top-end",
            icon: "warning",
            title: message,
            showConfirmButton: false,
            timer: 3000
        });
    });
    
    $(document).ready(function() {
        // $('#subject').select2();
        //     $('#subject').on('change', function (e) {
        //         var data = $(this).val();
        //         @this.set('subject', data);
        //     });

    // $('#subject').on('change', function (e) {
    //     livewire.emit('subject', e.target.value)
    });
</script>
