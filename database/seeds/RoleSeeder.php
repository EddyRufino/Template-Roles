<?php

use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        DB::table('roles')->insert([
            'name' => 'admin',
            'display_name' => 'Administrador',
            'description' => 'Soy un administrador'
        ]);

        DB::table('roles')->insert([
            'name' => 'role-2',
            'display_name' => 'Role Two',
            'description' => 'Soy una Role Two'
        ]);

        DB::table('roles')->insert([
            'name' => 'role-3',
            'display_name' => 'Role Three',
            'description' => 'Soy un Role Three'
        ]);

        // Datos para unir los roles con los usuarios

        DB::table('assigned_roles')->insert([
            'user_id' => 1,
            'role_id' => 1,
        ]);

        DB::table('assigned_roles')->insert([
            'user_id' => 2,
            'role_id' => 2,
        ]);

        DB::table('assigned_roles')->insert([
            'user_id' => 3,
            'role_id' => 3,
        ]);
    }
}
