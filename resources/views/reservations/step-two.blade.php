<x-guest-layout>
    <div class="flex items-center min-h-screen bg-gray-50">
      
        <div
          class="flex-1 h-full max-w-4xl mx-auto bg-white rounded-lg shadow-xl"
        >
          <div class="flex flex-col md:flex-row">
            <div class="h-32 md:h-auto md:w-1/2">
              <img
                class="object-cover w-full h-full"
                src="https://cdn.pixabay.com/photo/2021/01/15/17/01/green-5919790__340.jpg"
                alt="img"
              />
            </div>
            <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
              <div class="w-full">
                <h3 class="mb-4 text-xl font-bold text-blue-600">Make Reservation</h3>
  
                <div class="w-full bg-gray-200 rounded-full">
                  <div
                    class="
                      w-100
                      p-1
                      text-xs
                      font-medium
                      leading-none
                      text-center text-blue-100
                      bg-blue-600
                      rounded-full
                    "
                  >
                    Step2
                  </div>
                </div>
                <form method="POST" action="{{ route('reservations.store.step.two') }}">
                  @csrf
                  <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Table </label>
                    <div class="mt-1">
                        <select id="category_id" name="table_id"
                            class="form-multiselect block w-full mt-1  @error('table_id') border-red-500 @enderror">
                            @foreach ($tables as $table)
                                <option value="{{ $table->id }}">{{ $table->name }}
                                    ({{ $table->guest_number  }} Guest) 
                                </option>
                            @endforeach
    
    
                        </select>
                        @error('table_id')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
    
                
                <div class="flex justify-between">
                   <a href="{{ route('reservations.store.step.one') }}" 
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
                 "> Previous</a>
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
                    href="#"
                  >
                    Make Reservation
                  </button>
                </div>
                
              </form>
              </div>
            </div>
          </div>
        </div>
      
      </div>
    </body>
</x-guest-layout>    