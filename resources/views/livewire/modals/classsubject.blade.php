<div x-data="{ open: @entangle('showDropdown') }">
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
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Class and Subjects</h2>
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">Subject</th>
                                <th class="py-2 px-4 border-b">Classes</th> <!-- Added missing header for Classes -->
                            </tr>
                        </thead>
                        <tbody>
                            @if ($subjectdetails)
                                <tr>
                                    <td class="border px-4 py-2">{{ $subjectdetails['name'] }}</td>
                                    <td class="border px-4 py-2">
                                        <ul>
                                            @if (isset($subjectdetails['classes']))
                                            @foreach ($subjectdetails['classes'] as $class)
                                            <li class="flex items-center justify-between py-2 px-4 border-b">
                                                <span>{{ $class['name'] }}</span>
                                                <button wire:click="deleteClass({{ $class['id'] }})" class="text-red-500 hover:text-red-700 focus:outline-none">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </li>
                                        @endforeach
                                        
                                            @else
                                                <li>No classes available</li>
                                            @endif
                                        </ul>
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td colspan="2" class="border px-4 py-2">No subject details available</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    
                </div>
                <div class="px-6 py-4 bg-gray-100 border-t border-gray-200 flex justify-end">
                    <button type="button" @click="showDropdown = false" wire:click="hide"
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
