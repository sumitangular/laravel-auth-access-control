
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users', fn() => User::with('roles')->get());
    Route::get('/roles', fn() => Role::with('permissions')->get());
    Route::get('/permissions', fn() => Permission::all());

    Route::post('/roles', function (Request $request) {
        $data = $request->validate(['name' => 'required|unique:roles']);
        return Role::create($data);
    });

    Route::post('/permissions', function (Request $request) {
        $data = $request->validate(['name' => 'required|unique:permissions']);
        return Permission::create($data);
    });

    Route::post('/roles/{role}/permissions', function (Role $role, Request $request) {
        $role->permissions()->sync($request->permissions);
        return $role->load('permissions');
    });

    Route::post('/users/{user}/roles', function (User $user, Request $request) {
        $user->roles()->sync($request->roles);
        return $user->load('roles');
    });
});
