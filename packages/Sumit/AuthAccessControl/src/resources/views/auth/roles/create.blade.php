<h1>Create Role</h1>
<form method="POST" action="{{ route('roles.store') }}">
    @csrf
    <input type="text" name="name" placeholder="Role Name" required>
    <button type="submit">Create</button>
</form>
