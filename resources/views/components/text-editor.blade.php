@props(['disabled' => true, 'content'])
@if(isset($content))
    <textarea class="bg-gray-100 border border-gray-300 rounded-md p-4 resize-none w-full h-40" name="content">{{$content}}</textarea>
@else
    <textarea class="bg-gray-100 border border-gray-300 rounded-md p-4 resize-none w-full h-40" name="content"></textarea>
@endif
