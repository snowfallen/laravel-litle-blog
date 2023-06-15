<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>
        <div class="flex justify-center flex-col grid grid-cols-2 gap-4">
            @foreach($posts as $post)
                <div class="flex justify-center flex-col border border-gray-300 columns-12">
                    <h1 class="p-4 text-gray-800 dark:text-gray-200">{{ $post->title }}</h1>
                    <p class="text-gray-800 dark:text-gray-200">{{ $post->content }}</p>
                </div>
            @endforeach
        </div>
        <div class="flex justify-center m-5">
            {{ $posts->links() }}
        </div>
</x-app-layout>
