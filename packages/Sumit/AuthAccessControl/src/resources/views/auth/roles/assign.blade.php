<h1>Assign Roles</h1>
<form method="POST" action="{{ route('roles.assign.save') }}">
    @csrf
    <label>User:</label>
    <select name="user_id" required>
        @foreach($users as $user)
        <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>

    <label>Roles:</label>
    <select name="roles[]" multiple required>
        @foreach($roles as $role)
        <option value="{{ $role->id }}">{{ $role->name }}</option>
        @endforeach
    </select>

    <button type="submit">Assign</button>
</form>
