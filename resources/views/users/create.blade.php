<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Create user') }}
            </h2>
        </div>
    </x-slot>
    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg m-5">
        @include('users.partials.create-user-form')
    </div>
</x-app-layout>
