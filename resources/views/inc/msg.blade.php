{{-- <div class="p-4">
    @if (session('success'))
        <div class="row mb-2">
            <div class="col-lg-12">
                <div class="alert alert-success" role="alert">{{ session('success') }}</div>
            </div>
        </div>
    @endif

    @if (session('fail'))
        <div class="row mb-2">
            <div class="col-lg-12">
                <div class="alert alert-danger" role="alert">{{ session('fail') }}</div>
            </div>
        </div>
    @endif --}}

@if (session('success'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
        role="alert">
        <span class="font-medium">{{ session('success') }}</span> 
    </div>
@endif

@if (session('danger'))
    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <span class="font-medium"> {{ session('danger') }} </span> 
    </div>
@endif

@if (session('info'))
    <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
        <span class="font-medium">  {{ session('info') }} </span>
    </div>
@endif

@if (session('warning'))
<div class="flex p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
    
      <span class="font-medium"> {{ session('warning') }}</span> 
    
  </div>
  @endif

{{-- <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
    <span class="font-medium">Success alert!</span> Change a few things up and try submitting again.
  </div>
  <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
    <span class="font-medium">Warning alert!</span> Change a few things up and try submitting again.
  </div> --}}






{{-- @if ($errors->count() > 0)
        <div class="alert alert-danger">
            <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}



