<div x-app title="Staff Login">
    {{-- <x-app title="Admin Login" > --}}
        <x-slot name="navigation">
            <x-staffnavigation title="Staff Dashboard"/>

        </x-slot>
        <x-slot name="header">
            

        </x-slot>
    
        
       @include('livewire.modals.staffdetails')
</div>
