<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\Hash;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        // Create permissions
        $edit = Permission::firstOrCreate(['name' => 'edit-posts']);
        $delete = Permission::firstOrCreate(['name' => 'delete-posts']);

        // Create roles
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $editor = Role::firstOrCreate(['name' => 'editor']);

        // Assign permissions to roles
        $admin->permissions()->sync([$edit->id, $delete->id]);
        $editor->permissions()->sync([$edit->id]);

        // Create user and assign roles
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'Admin User', 'password' => Hash::make('password')]
        );

        $editorUser = User::firstOrCreate(
            ['email' => 'editor@example.com'],
            ['name' => 'Editor User', 'password' => Hash::make('password')]
        );

        $adminUser->roles()->sync([$admin->id]);
        $editorUser->roles()->sync([$editor->id]);
    }
}
