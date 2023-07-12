o<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.tables.index') }}"
                    class="px-4 py-2 bg-indigo-500 
                 hover:bg-indigo-700 text-white rounded-lg"> All
                    Tables </a>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg m-2 p-2">
                
                <form method="POST" action="{{ route('admin.tables.update', $table->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                    <div class="mb-6">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Table Name</label>
                        <input type="text" id="category_name" name="name" value="{{ $table->name }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="table number" required>
                    </div>
                    
                    <div class="mb-6">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Table Guest Number</label>
                        <input type="number" id="category_name" name="guest_number"  value="{{ $table->guest_number }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="table guest number" required>
                    </div>
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Status</label>
                    <div class="mt-1">
                        <select id="status" name="status" 
                        class="form-multiselect block w-full mt-1">
                            
                        @foreach (App\Enums\TableStatus::cases() as $status) 
                        <option value="{{ $status->value }}"
                            @selected($table->status->value == $status->value)> {{ $status->name }}</option>
                        @endforeach     
                            
                        </select>
                    </div>

                    </div>
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Status</label>
                    <div class="mt-1">
                        <select id="location" name="location" 
                        class="form-multiselect block w-full mt-1">
                            
                        @foreach (App\Enums\TableLocation::cases() as $location) 
                        <option value="{{ $location->value }}"
                            @selected($table->location->value == $location->value)> {{ $location->name }}</option>
                            @endforeach    
                            
                        </select>
                    </div>

                    </div>
                
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Update Table</button>
                </form>

            </div>
        </div>
</x-admin-layout>
