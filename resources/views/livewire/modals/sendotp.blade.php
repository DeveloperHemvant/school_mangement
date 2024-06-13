<!-- resources/views/livewire/show-otp-form.blade.php -->
<div x-data="{ open: @entangle('showOtpForm') }">
    <a href="#" @click.prevent="open = true" class="text-blue-500 hover:text-blue-700">Forgot Password?</a>

    <!-- Modal -->
    <div x-show="open" class="fixed inset-0 overflow-y-auto" style="display: none;">
        <div class="flex items-center justify-center min-h-screen">
            <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" x-show="open"
                x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>
            
            <!-- Modal content -->
            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-3/4 lg:w-1/2"
                role="dialog" aria-modal="true" aria-labelledby="modal-headline" x-show="open"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                
                <form wire:submit.prevent="sendOTP">
                    @csrf
                    <div class="px-6 py-4">
                        <h2 class="text-lg font-medium text-gray-900" id="modal-headline">Enter Mobile Number</h2>
                        
                        <div class="mt-4">
                            <label for="phone" class="block text-gray-700">Mobile Number</label>
                            <input type="text" wire:model="phone" id="phone" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                            @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="px-6 py-4 bg-gray-100 border-t border-gray-200">
                        <button type="submit" class="w-full py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                            Send OTP
                        </button>
                    </div>
                </form>

                <div class="px-6 py-4 bg-gray-100 border-t border-gray-200 flex justify-end">
                    <button type="button" @click="open = false" class="text-gray-600 mr-4">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- verify otp --}}

<div x-data="{ open: @entangle('verifyOtpForm') }">
    <a href="#" @click.prevent="open = true" class="text-blue-500 hover:text-blue-700">Forgot Password?</a>

    <!-- Modal -->
    <div x-show="open" class="fixed inset-0 overflow-y-auto" style="display: none;">
        <div class="flex items-center justify-center min-h-screen">
            <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" x-show="open"
                x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>
            
            <!-- Modal content -->
            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-3/4 lg:w-1/2"
                role="dialog" aria-modal="true" aria-labelledby="modal-headline" x-show="open"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                
                <form wire:submit.prevent="sendOTP">
                    @csrf
                    <div class="px-6 py-4">
                        <h2 class="text-lg font-medium text-gray-900" id="modal-headline">Enter OTP</h2>
                        
                        <div class="mt-4">
                            <label for="phone" class="block text-gray-700">OTP</label>
                            <input type="text" wire:model="otp" id="phone" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                            @error('otp') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="px-6 py-4 bg-gray-100 border-t border-gray-200">
                        <button type="submit" class="w-full py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                            Verify
                        </button>
                    </div>
                </form>

                <div class="px-6 py-4 bg-gray-100 border-t border-gray-200 flex justify-end">
                    <button type="button" @click="open = false" class="text-gray-600 mr-4">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>




<script>
window.addEventListener('otp-sent', function () {
    Swal.fire({
      icon: 'success',
      position: "top-end",
    title: "OTP sent",
    showConfirmButton: false,
    timer: 1500
  });
});
</script>
