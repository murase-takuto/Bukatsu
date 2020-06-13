<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleHasPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // admin
        $permissions = [
            'admin_permission',
            'manager_permission',
            'player_permission',
        ];
        $role = Role::findByName('admin');
        $role->givePermissionTo($permissions);

        // manager
        $permissions = [
            'manager_permission',
            'player_permission',
        ];
        $role = Role::findByName('manager');
        $role->givePermissionTo($permissions);

        // staff
        $permissions = [
            'player_permission',
        ];
        $role = Role::findByName('player');
        $role->givePermissionTo($permissions);
    }
}
