<h1>Roles</h1>
<a href="{{ route('roles.create') }}">Create Role</a> | 
<a href="{{ route('roles.assign') }}">Assign Roles</a>
<ul>
@foreach($roles as $role)
    <li>{{ $role->name }} ({{ $role->users->count() }} users)</li>
@endforeach
</ul>
