<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.reservation.create') }}"
                    class="px-4 py-2 bg-indigo-500 
                 hover:bg-indigo-700 text-white rounded-lg"> New
                    Reservation </a>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Id
                            </th>
                            <th scope="col" class="px-6 py-3">
                                FirstName
                            </th>
                          
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                           
                            

                            <th scope="col" class="px-6 py-3">
                                Phone Number
                            </th>
                            
                            <th scope="col" class="px-6 py-3">
                                Reservation Date
                            </th>
                            
                            <th scope="col" class="px-6 py-3">
                                  Table
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Guest Number
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Date Created
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($reservations as $reserve)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4">
                                    {{ $reserve->id }}
                                </td>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $reserve->first_name }}     {{ $reserve->last_name }}
                                </th>
                                
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $reserve->email }}
                                </th>
                            
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $reserve->phone }}
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $reserve->res_date }}
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $reserve->table->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $reserve->guest_number }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $reserve->created_at->format(config('app.date_format')) }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.reservation.edit', $reserve->id) }}"
                                        class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg
                                        text-white">Edit</a>
                                </td>
                                <td class="px-6 py-4">
                                    <form
                                        class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg
                                    text-white"
                                        method="POST" action="{{ route('admin.reservation.destroy', $reserve->id) }}"
                                        onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">DELETE</button>

                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
