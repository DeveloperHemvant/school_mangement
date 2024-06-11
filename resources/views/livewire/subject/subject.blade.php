<div x-app title="All Subject">
    <x-slot name="navigation">
        <x-adminnavigation title="All Subjects"/>
    </x-slot>
    <x-slot name="header">
        
    </x-slot>
        <div>
           
            <div>
                <button
                style="background-color: #1e40af; color: #ffffff; font-weight: bold; padding: 0.5rem 1rem; border-radius: 0.25rem; border: none; outline: none; cursor: pointer; transition: background-color 0.3s ease;"
                wire:click="toggleAddForm" class="bg-blue-500 hover:bg-blue-700  font-bold py-2 px-4 rounded mb-4">
                {{ $showAddForm ? 'Cancel' : 'Add Subject' }}
            </button>
            <button
            style="background-color: #1e40af; color: #ffffff; font-weight: bold; padding: 0.5rem 1rem; border-radius: 0.25rem; border: none; outline: none; cursor: pointer; transition: background-color 0.3s ease;"
            wire:click="toggleAddSubForm" class="bg-blue-500 hover:bg-blue-700  font-bold py-2 px-4 rounded mb-4">
            {{ $showsyncForm ? 'Cancel' : 'Assign  Subject and Class' }}
        </button>
            <button
                style="background-color: #1e40af; color: #ffffff; font-weight: bold; padding: 0.5rem 1rem; border-radius: 0.25rem; border: none; outline: none; cursor: pointer; transition: background-color 0.3s ease;"
                wire:click="restore" class="bg-blue-500 hover:bg-blue-700  font-bold py-2 px-4 rounded mb-4">
                Restore all Subjects
            </button>
            @if (session()->has('status'))
                <div class="alert {{ session('status') ? 'alert-success' : 'alert-danger' }}">
                    <span class="text-red-500 text-sm">  {{ session('status') }}</span>
                </div>
            @endif
            @if (session()->has('success'))
            <div class="alert {{ session('success') ? 'alert-success' : 'alert-danger' }}">
                <span class="text-green-500 text-sm">  {{ session('success') }}</span>
            </div>
        @endif
            @if ($showAddForm)
                    
                    <form wire:submit.prevent="save" class="mb-4 max-w-lg mx-auto p-4 bg-white shadow-md rounded-lg"
                        autocomplete="off">
                        <div class="mb-4">
                            <x-common.input name="name" label="Subject Name:" labelclass="block text-gray-700  font-bold mb-2" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" type="text" model="name"/>
                            @error('name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex items-center justify-between">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Save
                            </button>
                        </div>
                    </form>
                    @endif
                    @if ($showsyncForm)
                    
                    <form wire:submit="syncsave" class="mb-4 max-w-lg mx-auto p-4 bg-white shadow-md rounded-lg"
                        autocomplete="off">
                        <div class="mb-4">
                            
                            <x-common.selecttag 
                                name="Class" 
                                label="Class Name:" 
                                labelclass="block text-gray-700 font-bold mb-2" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                                model="ClassName" 
                                :options="$class" />
                            @error('ClassName')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <x-common.selecttag 
                            name="Subject" 
                            label="Subject Name:" 
                            labelclass="block text-gray-700 font-bold mb-2" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                            model="SubjectName" 
                            :options="$data" />

                            @error('SubjectName')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                      
                       
                        
                       
                        <div class="flex items-center justify-between">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Save
                            </button>
                        </div>
                    </form>
                    @endif
       
            @if ($data)
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sr.
                                No.</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Subject Name</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @php
                            $count = 1;
                        @endphp
                        @foreach ($data as $university)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $count }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">  {{ $university->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button wire:click="edit({{ $university->id }})"
                                        style="background-color: #1e40af; color: #ffffff; font-weight: bold; padding: 0.5rem 1rem; border-radius: 0.25rem; border: none; outline: none; cursor: pointer; transition: background-color 0.3s ease;"
                                        class="text-indigo-600 hover:text-indigo-900">
                                        Edit
                                    </button>
                                    <button wire:click="details({{ $university->id }})"
                                        style="background-color: #159c10; color: #ffffff; font-weight: bold; padding: 0.5rem 1rem; border-radius: 0.25rem; border: none; outline: none; cursor: pointer; transition: background-color 0.3s ease;"
                                        class="text-indigo-600 hover:text-indigo-900">
                                        Detail
                                    </button>
                                    <button
                                        style="background-color: #ee0202; color: #ffffff; font-weight: bold; padding: 0.5rem 1rem; border-radius: 0.25rem; border: none; outline: none; cursor: pointer; transition: background-color 0.3s ease;"
                                        wire:click="confirmDelete({{ $university->id }})"
                                        class="text-red-600 hover:text-red-900 ml-2">Delete</button>
                                </td>
                            </tr>
                            @if ($showEditForm && $id === $university->id)
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
         
            @else
            <p class="text-red-500 text-center">No Subject found.</p>
            @endif
        </div>
    @include('livewire.modals.classsubject')
</div>
<script>


    // In your Javascript (external .js resource or <script> tag)
        // document.addEventListener('DOMContentLoaded', function () {
        //     var subjectElement = document.getElementById('Subject');
        //     // Initialize Select2 on the subjectElement
        //     if (subjectElement) {
        //         $(subjectElement).select2();
        //     }
        // });
        window.addEventListener('deleteClass', function () {
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


//   Livewire.on('deleteclass', function () {
//       Swal.fire({
//         position: "top-end",
//         title: "Class has been Deleted",
//         showConfirmButton: false,
//         timer: 1500,
      
//           icon: 'success'
//       });
//   });
//   Livewire.on('updateclass', function () {
//       Swal.fire({
//         position: "top-end",
//         title: "Class has been Updated",
//         showConfirmButton: false,
//         timer: 1500,
      
//           icon: 'success'
//       });
      Livewire.on('delete', function () {
      Swal.fire({
        position: "top-end",
        title: "Subject has been deleted",
        showConfirmButton: false,
        timer: 1500,
      
          icon: 'success'
      });
  });
  });

});
</script>