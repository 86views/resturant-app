<x-guest-layout>
    <div class="flex items-center min-h-screen bg-gray-50 mb-5">

        <div class="flex-1 h-full max-w-4xl mx-auto bg-white rounded-lg shadow-xl">
            <div class="flex flex-col md:flex-row">
                <div class="h-32 md:h-auto md:w-1/2">
                    <img class="object-cover w-full h-full"
                        src="https://cdn.pixabay.com/photo/2021/01/15/17/01/green-5919790__340.jpg" alt="img" />
                </div>
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <div class="w-full">
                        <h3 class="mb-4 text-xl font-bold text-blue-600">Make Reservation</h3>

                        <div class="w-full bg-gray-200 rounded-full">
                            <div
                                class="
                      w-40
                      p-1
                      text-xs
                      font-medium
                      leading-none
                      text-center text-blue-100
                      bg-blue-600
                      rounded-full
                    ">
                                Step1
                            </div>
                        </div>
                        <form method="POST" action="{{ route('reservations.store.step.one') }}">
                            @csrf
                            <div class="mb-6">
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                                <input type="text" id="category_name" name="first_name"  value="{{ $reservation->first_name ?? '' }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                                     dark:focus:border-blue-500 @error('first_name') border-red-500 @enderror"
                                    placeholder="Firstname">
                                @error('first_name')
                                    <div class="text-sm text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                    
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last 
                            Name</label>
                        <input type="text" id="category_name" name="last_name" value="{{ $reservation->last_name ?? '' }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                                     dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500  @error('last_name') border-red-500 @enderror"
                            placeholder="Lastname">
                        @error('last_name')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
        
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category
                            Name</label>
                        <input type="email" id="category_name" name="email" value="{{ $reservation->email ?? '' }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                                     dark:focus:border-blue-500  @error('email') border-red-500 @enderror"
                            placeholder="Email">
        
                        @error('email')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
        
        
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone
                            Number</label>
                        <input type="tel" id="phone" name="phone" value="{{ $reservation->phone ?? '' }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 
                                    dark:focus:border-blue-500  @error('phone') border-red-500 @enderror"
                                placeholder="Enter your phone number:">
                        @error('phone')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
        
                    <div class="mb-6">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Reservation</label>
                        <input type="datetime-local" id="res_date" name="res_date"
                        min="{{ $min_date->format('Y-m-d\TH:i:s') }}" 
                        max="{{  $max_date->format('Y-m-d\TH:i:s')  }}"
                           value="{{  $reservation ? $reservation->res_date->format('Y-m-d\TH:i:s') : '' }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                                     dark:focus:border-blue-500  @error('res_date') border-red-500 @enderror"
                            placeholder="Reservation Date">
                        @error('res_date')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
        
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Guest
                            Number</label>
                        <input type="number" id="guest_number" name="guest_number"   value="{{ $reservation->guest_number ?? '' }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                                     dark:focus:border-blue-500  @error('guest_number') border-red-500 @enderror"
                            placeholder="Guest Number">
                        @error('guest_number')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>    
                          
                            <div class="flex justify-end">
                                <button
                                    class="
                        px-6
                        py-2
                        mt-4
                        text-sm
                        font-medium
                        leading-5
                        text-center text-white
                        transition-colors
                        duration-150
                        bg-blue-600
                        border border-transparent
                        rounded-lg
                        hover:bg-blue-700
                        focus:outline-none
                      "
                                    href="#">
                                    Next
                                </button>
                            </div>

                            <div class="mt-4 text-center">
                                <p class="text-sm">
                                    Already have account
                                    <a href="#" class="text-blue-600 hover:underline">
                                        Sign in.</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </body>
</x-guest-layout>
