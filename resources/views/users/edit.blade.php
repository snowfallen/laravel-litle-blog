<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Update user') }}
            </h2>
        </div>
    </x-slot>
    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        @include('users.partials.edit-user-form',['user' => $user])
    </div>
</x-app-layout>
