<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.menus.index') }}"
                    class="px-4 py-2 bg-indigo-500 
                 hover:bg-indigo-700 text-white rounded-lg"> All
                    Menus </a>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg m-2 p-2">

                <form method="POST" action="{{ route('admin.menus.update', $menu->id) }}" enctype="multipart/form-data">
                    
                    @csrf
                    @method('PUT')
                    <div class="mb-6">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Menu Name</label>
                        <input type="text" id="category_name" name="name" value="{{ $menu->name }}"
                            class="bg-gray-50 border border-gray-300
                             text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                              dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('name') border-red-500 @enderror"
                            placeholder="Menu name">

                            @error('name')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-6">

                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="file_input">Menu Image</label>
                            <div class="m-2">
                                <img class=w-32 h-32 src="{{ Storage::url($menu->image) }}">
                            </div>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer
                             bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700
                              dark:border-gray-600 dark:placeholder-gray-400 @error('image') border-red-500 @enderror"
                            aria-describedby="file_input_help" id="file_input" name="image" type="file">
                            @error('image')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                           @enderror
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or
                            GIF (MAX. 800x400px).</p>

                    </div>
                    <div class="mb-6">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                        <input type="number" id="category_name" name="price" value="{{ $menu->price }}"
                            class="bg-gray-50 border border-gray-300
                             text-gray-900 text-sm rounded-lg focus:ring-blue-500
                              focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700
                               dark:border-gray-600 dark:placeholder-gray-400
                                dark:text-white dark:focus:ring-blue-500
                                 dark:focus:border-blue-500  @error('price') border-red-500 @enderror"
                                 placeholder="enter your price">
                                 @error('price')
                                 <div class="text-sm text-red-400">{{ $message }}</div>
                             @enderror
                    </div>
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Categories</label>
                        <div class="mt-1">
                            <select id="category_id" name="categories[]" 
                            class="form-multiselect block w-full mt-1 @error('categories[]') border-red-500 @enderror"
                                multiple>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id == $menu->category_id ? 'selected' : '' }}>
                                    {{ $category->name }}</option>
                                   @endforeach
                            </select>
                            @error('categories[]')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="mb-6">

                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Description</label>
                        <textarea id="message" rows="4" name="description"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600
                             dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                              dark:focus:border-blue-500  @error('description') border-red-500 @enderror"
                            placeholder="Write your thoughts here...">

                            {{ $menu->description }}
                        </textarea>

                        @error('description')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror

                    </div>


                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>

            </div>
        </div>
</x-admin-layout>
