<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelHasPermission extends Seeder
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
            'model_type' => 'App\Models\User',
            'model_id' => 1
        ];
        $data2 = [
            'permission_id' => 11,
            'model_type' => 'App\Models\User',
            'model_id' => 1
        ];
        $data3 = [
            'permission_id' => 12,
            'model_type' => 'App\Models\User',
            'model_id' => 1
        ];
        $data4 = [
            'permission_id' => 29,
            'model_type' => 'App\Models\User',
            'model_id' => 1
        ];
        $data5 = [
            'permission_id' => 30,
            'model_type' => 'App\Models\User',
            'model_id' => 1
        ];
        $data6 = [
            'permission_id' => 31,
            'model_type' => 'App\Models\User',
            'model_id' => 1
        ];

        $modelHasPermission = DB::table('model_has_permissions')->insertGetId($data);
        $modelHasPermission = DB::table('model_has_permissions')->insertGetId($data2);
        $modelHasPermission = DB::table('model_has_permissions')->insertGetId($data3);
        $modelHasPermission = DB::table('model_has_permissions')->insertGetId($data4);
        $modelHasPermission = DB::table('model_has_permissions')->insertGetId($data5);
        $modelHasPermission = DB::table('model_has_permissions')->insertGetId($data6);
    }
}
