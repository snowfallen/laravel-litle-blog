<x-app-layout>
    @if(session('success'))
        <div class="relative bg-green-500 text-white font-bold p-4">
          <span class="absolute top-0 right-0 px-3 py-2 cursor-pointer" onclick="this.parentElement.style.display = 'none'">
            <svg class="h-5 w-5 text-white" fill="currentColor" viewBox="0 0 20 20">
              <path
                  fill-rule="evenodd"
                  d="M3.293 3.293a1 1 0 011.414 0L10 8.586l5.293-5.293a1 1 0 011.414 1.414L11.414 10l5.293 5.293a1 1 0 01-1.414 1.414L10 11.414l-5.293 5.293a1 1 0 01-1.414-1.414L8.586 10 3.293 4.707a1 1 0 010-1.414z"
                  clip-rule="evenodd"
              ></path>
            </svg>
          </span>
            {{ session('success') }}
        </div>

    @endif
    <x-slot name="header">
        <div class="flex flex-row justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Users') }}
            </h2>
            @if(auth()->user()->hasRole('admin'))
                <a href="{{route('user.create')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    {{ __('Create user') }}
                </a>
            @endif
        </div>
    </x-slot>
    <div class="flex justify-center flex-col grid grid-cols-1 gap-4 m-10">
        @include('users.table',['users' => $users])
    </div>
</x-app-layout>
