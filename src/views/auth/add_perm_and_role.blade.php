<!-- resources/views/auth/add_perm_and_role.blade.php -->

<form method="POST" action="/role">
    {!! csrf_field() !!}

    <div>
        perm name
        <input type="text" name="perm_name" value="{{ old('perm_name') }}">
    </div>

    <div>
        perm display name
        <input type="text" name="perm_display_name">
    </div>

    <div>
        role name
        <input type="text" name="role_name">
    </div>

    <div>
        role display name
        <input type="text" name="role_display_name">
    </div>

    <div>
        为perm选择role
        <select name="perm_selected_role">
        @foreach ($roles as $role)
            <option style="width:400px">{{$role->name}}</option>
        @endforeach
        </select>

    </div>

    <div>
        <button type="submit">Submit</button>
    </div>
</form>