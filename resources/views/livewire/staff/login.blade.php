<div x-app title="Admin Login">
    {{-- <x-app title="Admin Login" > --}}
    
        <x-slot name="header">
            <x-navigation title="Staff Login  Page"/>

        </x-slot>
    
        <div class="min-h-screen flex items-center justify-center">
            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
                <h2 class="text-2xl font-bold mb-6 text-center">Staff Login</h2>
                <form>
                    @csrf
                    <div class="mb-4">
                        <x-common.input name="email" label="Email Address" labelclass="block text-gray-700 mb-2" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" type="text" model="name"/>
                    </div>
                    <div class="mb-4">
                        <x-common.input name="password" model="password" label="Password " labelclass="block text-gray-700 mb-2" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" type="password" model="password" 
                        />
                    </div>
                    <div class="mb-6 flex items-center justify-between">
                        <div class="flex items-center">
                            
                            <input type="checkbox" name="remember" id="remember" class="mr-2">
                            <label for="remember" class="text-gray-700">Remember Me</label>
                        </div>
                        <a href="" class="text-blue-500 hover:text-blue-700">Forgot Password?</a>
                    </div>
                    <button type="submit" class="w-full py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                        Login
                    </button>
                </form>
            </div>
        </div>
    {{-- </x-app> --}}
</div>
