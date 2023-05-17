<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleHasPermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'permission_id' => 10,
            'role_id' => 1
        ];
        $data2 = [
            'permission_id' => 11,
            'role_id' => 1
        ];
        $data3 = [
            'permission_id' => 12,
            'role_id' => 1
        ];
        $data4 = [
            'permission_id' => 29,
            'role_id' => 1
        ];
        $data5 = [
            'permission_id' => 30,
            'role_id' => 1
        ];
        $data6 = [
            'permission_id' => 31,
            'role_id' => 1
        ];

        $roleHasPermission = DB::table('role_has_permissions')->insertGetId($data);
        $roleHasPermission = DB::table('role_has_permissions')->insertGetId($data2);
        $roleHasPermission = DB::table('role_has_permissions')->insertGetId($data3);
        $roleHasPermission = DB::table('role_has_permissions')->insertGetId($data4);
        $roleHasPermission = DB::table('role_has_permissions')->insertGetId($data5);
        $roleHasPermission = DB::table('role_has_permissions')->insertGetId($data6);
    }
}
