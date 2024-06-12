<div x-app title="All staff">
    <x-slot name="navigation">
        <x-adminnavigation title="All staff"/>
    </x-slot>
    <x-slot name="header">
        
    </x-slot>
        <div>
           
            <div>
                <button
                style="background-color: #1e40af; color: #ffffff; font-weight: bold; padding: 0.5rem 1rem; border-radius: 0.25rem; border: none; outline: none; cursor: pointer; transition: background-color 0.3s ease;"
                wire:click="toggleAddForm" class="bg-blue-500 hover:bg-blue-700  font-bold py-2 px-4 rounded mb-4">
                {{ $showAddForm ? 'Cancel' : 'Add Staff' }}
            </button>
            <button
                style="background-color: #1e40af; color: #ffffff; font-weight: bold; padding: 0.5rem 1rem; border-radius: 0.25rem; border: none; outline: none; cursor: pointer; transition: background-color 0.3s ease;"
                wire:click="restore" class="bg-blue-500 hover:bg-blue-700  font-bold py-2 px-4 rounded mb-4">
                Restore all Staff
            </button>
            @if (session()->has('status'))
                <div class="alert {{ session('status') ? 'alert-success' : 'alert-danger' }}">
                    {{ session('status') }}
                </div>
            @endif
       
                   
                    <div class="flex flex-col md:flex-row md:space-x-3">
                        <div class="flex space-x-3 items-center mb-4 md:mb-0">
                            <label class="w-40 text-sm font-medium text-gray-900">Role:</label>
                            <select wire:model.live.debounce.150ms="u_search"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value=""> Select Role </option>
                                {{-- @foreach ($role as $item)
                                    <option value="{{ $item->id }}"> {{ $item->name }} </option>
                                @endforeach
                            </select> --}}
                        </div>
                        <div class="flex md:w-auto w-full mb-4 md:mb-0">
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" wire:model.live.debounce.250ms="search"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2"
                                    placeholder="Search">
                            </div>
                        </div>
                    </div>
            {{-- @if ($data->count()) --}}
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sr.
                                No.</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email</th>
                            {{-- <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Role</th> --}}
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @php
                            $count = 1;
                        @endphp
                        @foreach ($data as $staff)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $count }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $staff->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $staff->email }}</td>
                                {{-- <td class="px-6 py-4 whitespace-nowrap">{{ $staff->role->name }}</td> --}}
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button wire:click="edit({{ $staff->id }})"
                                        style="background-color: #1e40af; color: #ffffff; font-weight: bold; padding: 0.5rem 1rem; border-radius: 0.25rem; border: none; outline: none; cursor: pointer; transition: background-color 0.3s ease;"
                                        class="text-indigo-600 hover:text-indigo-900">
                                        Edit
                                    </button>
                                    <button
                                        style="background-color: #ee0202; color: #ffffff; font-weight: bold; padding: 0.5rem 1rem; border-radius: 0.25rem; border: none; outline: none; cursor: pointer; transition: background-color 0.3s ease;"
                                        wire:click="confirmDelete({{ $staff->id }})"
                                        class="text-red-600 hover:text-red-900 ml-2">Delete</button>
                                </td>
                            </tr>
                            @if ($showEditForm && $id === $staff->id)
                                <tr>
        
                                    <td colspan="2">
                                        <!-- Edit Associate Form -->
                                        <form wire:submit.prevent="update"
                                            class="mb-4 max-w-lg mx-auto p-4 bg-white shadow-md rounded-lg" autocomplete="off">
                                            <div class="mb-4">
                                                <label for="name" class="block text-gray-700 font-bold mb-2">Class
                                                    Name:</label>
                                                <input type="text" id="university_name" wire:model="name"
                                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                                @error('name')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                           
                                            <div class="flex items-center justify-between">
                                                <button type="submit"
                                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                                    Update
                                                </button>
                                            </div>
                                        </form>
        
                                    </td>
                                </tr>
                            @endif
                            @php
                                $count++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
                {{-- {{ $data->links() }} --}}
            {{-- @else
                <p>No Class found.</p>
            @endif --}}
        </div>
    @include('livewire.modals.staffModal')
</div>
<script>
    window.addEventListener('save', function () {
        Swal.fire({
          icon: 'success',
          position: "top-end",
        title: "Staff has been saved",
        showConfirmButton: false,
        timer: 1500
      });
});

window.addEventListener('delete', function () {
   Swal.fire({
       title: 'Are you sure?',
       text: 'You won\'t be able to revert this!',
       icon: 'warning',
       showCancelButton: true,
       confirmButtonText: 'Yes, delete it!',
       cancelButtonText: 'No, cancel!',
       reverseButtons: true
   }).then((result) => {
     if (result.isConfirmed) {
           Livewire.dispatch('goOn-Delete')
       }
   });


  Livewire.on('deleteclass', function () {
      Swal.fire({
        position: "top-end",
        title: "Staff has been Deleted",
        showConfirmButton: false,
        timer: 1500,
      
          icon: 'success'
      });
  });
  Livewire.on('updateclass', function () {
      Swal.fire({
        position: "top-end",
        title: "Class has been Updated",
        showConfirmButton: false,
        timer: 1500,
      
          icon: 'success'
      });
      Livewire.on('restore', function () {
      Swal.fire({
        position: "top-end",
        title: "Staff has been Restored",
        showConfirmButton: false,
        timer: 1500,
          icon: 'success'
      });
  });
  });

});
 
 </script>