<div>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $title }}
    </h2>
    <ul class="flex space-x-4">
        <li><a href="/" wire:navigate class="text-blue-500">Home</a></li>
        <li><a href="{{route('adminlogin')}}" wire:navigate class="text-blue-500">Admin Login</a></li>
        <li><a href="{{route('parentlogin')}}" wire:navigate class="text-blue-500">Parent Login</a></li>
        <li><a href="{{route('stafflogin')}}" wire:navigate class="text-blue-500">Staff Login</a></li>
        <li><a href="{{route('studentlogin')}}" wire:navigate class="text-blue-500">Student Login</a></li>
    </ul>
</div>
