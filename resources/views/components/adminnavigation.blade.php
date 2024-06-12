<div>

    
    <div class="flex flex-col w-64 h-screen bg-gray-900 text-white">
        <div class="flex items-center justify-center h-16 bg-gray-800 shadow-md">
            <a href="/" class="text-xl font-bold text-white">{{$title}}</a>
        </div>
        <nav class="flex-1 px-2 py-4 space-y-1">
            <a href="{{route('admindashboard')}}"  wire:navigate class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white">
                <svg class="w-6 h-6 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v16a1 1 0 01-1 1H4a1 1 0 01-1-1V4z"></path>
                </svg>
                Home
            </a>
            <div x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center px-4 py-2 w-full text-left text-gray-300 hover:bg-gray-700 hover:text-white focus:outline-none">
                    <svg class="w-6 h-6 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Manage Class
                    <svg :class="{'transform rotate-180': open, 'transform rotate-0': !open}" class="w-5 h-5 ml-auto transition-transform">
                        <path stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="mt-1 space-y-1 pl-8">
                    <a href="{{ route('class') }}" wire:navigate class="block px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white">
                        Manage Classes
                    </a>
                </div>
            </div>
            <div x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center px-4 py-2 w-full text-left text-gray-300 hover:bg-gray-700 hover:text-white focus:outline-none">
                    <svg class="w-6 h-6 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Manage Subject
                    <svg :class="{'transform rotate-180': open, 'transform rotate-0': !open}" class="w-5 h-5 ml-auto transition-transform">
                        <path stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="mt-1 space-y-1 pl-8">
                    <a href="{{ route('subject') }}" wire:navigate class="block px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white">
                        Manage Subject
                    </a>
                </div>
            </div>
            <div x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center px-4 py-2 w-full text-left text-gray-300 hover:bg-gray-700 hover:text-white focus:outline-none">
                    <svg class="w-6 h-6 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Manage Staff
                    <svg :class="{'transform rotate-180': open, 'transform rotate-0': !open}" class="w-5 h-5 ml-auto transition-transform">
                        <path stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="mt-1 space-y-1 pl-8">
                    <a href="{{ route('staff') }}" wire:navigate class="block px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white">
                        Manage Staff
                    </a>
                </div>
               
            </div>

            <div x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center px-4 py-2 w-full text-left text-gray-300 hover:bg-gray-700 hover:text-white focus:outline-none">
                    <svg class="w-6 h-6 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Manage Roles and Permissions
                    <svg :class="{'transform rotate-180': open, 'transform rotate-0': !open}" class="w-5 h-5 ml-auto transition-transform">
                        <path stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="mt-1 space-y-1 pl-8">
                    <a href="{{ route('roles') }}" wire:navigate class="block px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white">
                        Manage Roles
                    </a>
                </div>
                <div x-show="open" x-transition class="mt-1 space-y-1 pl-8">
                    <a href="{{ route('permission') }}" wire:navigate class="block px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white">
                        Manage Permissions
                    </a>
                </div>
               
            </div>
           
        </nav>
    @livewire('logout')

    </div>
   
    
    
    

</div>