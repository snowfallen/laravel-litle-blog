<label>
    <select class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" name="role">
        @foreach(\Spatie\Permission\Models\Role::all() as $role)
            <option value="{{ $role->name }}">{{ $role->name }}</option>
        @endforeach
    </select>
</label>
