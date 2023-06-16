<section>
    <form method="POST" action="{{ route('post.update', ['post' => $post]) }}">
        @csrf
        @method('patch')

        <!-- Title -->
        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$post->title"/>
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div >

        <!-- Content -->
        <div class="mt-4">
            <x-input-label for="content" :value="__('Content')" />
            <x-text-editor for="content" name="content" :content="$post->content"></x-text-editor>
            <x-input-error :messages="$errors->get('content')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Update') }}
            </x-primary-button>
        </div>
    </form>
</section>
