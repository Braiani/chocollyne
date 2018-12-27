<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'key' => 'browse_admin',
                'table_name' => NULL,
                'created_at' => '2018-11-26 03:07:02',
                'updated_at' => '2018-11-26 03:07:02',
            ),
            1 => 
            array (
                'id' => 2,
                'key' => 'browse_bread',
                'table_name' => NULL,
                'created_at' => '2018-11-26 03:07:02',
                'updated_at' => '2018-11-26 03:07:02',
            ),
            2 => 
            array (
                'id' => 3,
                'key' => 'browse_database',
                'table_name' => NULL,
                'created_at' => '2018-11-26 03:07:02',
                'updated_at' => '2018-11-26 03:07:02',
            ),
            3 => 
            array (
                'id' => 4,
                'key' => 'browse_media',
                'table_name' => NULL,
                'created_at' => '2018-11-26 03:07:02',
                'updated_at' => '2018-11-26 03:07:02',
            ),
            4 => 
            array (
                'id' => 5,
                'key' => 'browse_compass',
                'table_name' => NULL,
                'created_at' => '2018-11-26 03:07:03',
                'updated_at' => '2018-11-26 03:07:03',
            ),
            5 => 
            array (
                'id' => 6,
                'key' => 'browse_menus',
                'table_name' => 'menus',
                'created_at' => '2018-11-26 03:07:03',
                'updated_at' => '2018-11-26 03:07:03',
            ),
            6 => 
            array (
                'id' => 7,
                'key' => 'read_menus',
                'table_name' => 'menus',
                'created_at' => '2018-11-26 03:07:03',
                'updated_at' => '2018-11-26 03:07:03',
            ),
            7 => 
            array (
                'id' => 8,
                'key' => 'edit_menus',
                'table_name' => 'menus',
                'created_at' => '2018-11-26 03:07:03',
                'updated_at' => '2018-11-26 03:07:03',
            ),
            8 => 
            array (
                'id' => 9,
                'key' => 'add_menus',
                'table_name' => 'menus',
                'created_at' => '2018-11-26 03:07:03',
                'updated_at' => '2018-11-26 03:07:03',
            ),
            9 => 
            array (
                'id' => 10,
                'key' => 'delete_menus',
                'table_name' => 'menus',
                'created_at' => '2018-11-26 03:07:03',
                'updated_at' => '2018-11-26 03:07:03',
            ),
            10 => 
            array (
                'id' => 11,
                'key' => 'browse_roles',
                'table_name' => 'roles',
                'created_at' => '2018-11-26 03:07:03',
                'updated_at' => '2018-11-26 03:07:03',
            ),
            11 => 
            array (
                'id' => 12,
                'key' => 'read_roles',
                'table_name' => 'roles',
                'created_at' => '2018-11-26 03:07:03',
                'updated_at' => '2018-11-26 03:07:03',
            ),
            12 => 
            array (
                'id' => 13,
                'key' => 'edit_roles',
                'table_name' => 'roles',
                'created_at' => '2018-11-26 03:07:03',
                'updated_at' => '2018-11-26 03:07:03',
            ),
            13 => 
            array (
                'id' => 14,
                'key' => 'add_roles',
                'table_name' => 'roles',
                'created_at' => '2018-11-26 03:07:03',
                'updated_at' => '2018-11-26 03:07:03',
            ),
            14 => 
            array (
                'id' => 15,
                'key' => 'delete_roles',
                'table_name' => 'roles',
                'created_at' => '2018-11-26 03:07:03',
                'updated_at' => '2018-11-26 03:07:03',
            ),
            15 => 
            array (
                'id' => 16,
                'key' => 'browse_users',
                'table_name' => 'users',
                'created_at' => '2018-11-26 03:07:03',
                'updated_at' => '2018-11-26 03:07:03',
            ),
            16 => 
            array (
                'id' => 17,
                'key' => 'read_users',
                'table_name' => 'users',
                'created_at' => '2018-11-26 03:07:03',
                'updated_at' => '2018-11-26 03:07:03',
            ),
            17 => 
            array (
                'id' => 18,
                'key' => 'edit_users',
                'table_name' => 'users',
                'created_at' => '2018-11-26 03:07:03',
                'updated_at' => '2018-11-26 03:07:03',
            ),
            18 => 
            array (
                'id' => 19,
                'key' => 'add_users',
                'table_name' => 'users',
                'created_at' => '2018-11-26 03:07:03',
                'updated_at' => '2018-11-26 03:07:03',
            ),
            19 => 
            array (
                'id' => 20,
                'key' => 'delete_users',
                'table_name' => 'users',
                'created_at' => '2018-11-26 03:07:03',
                'updated_at' => '2018-11-26 03:07:03',
            ),
            20 => 
            array (
                'id' => 21,
                'key' => 'browse_settings',
                'table_name' => 'settings',
                'created_at' => '2018-11-26 03:07:03',
                'updated_at' => '2018-11-26 03:07:03',
            ),
            21 => 
            array (
                'id' => 22,
                'key' => 'read_settings',
                'table_name' => 'settings',
                'created_at' => '2018-11-26 03:07:04',
                'updated_at' => '2018-11-26 03:07:04',
            ),
            22 => 
            array (
                'id' => 23,
                'key' => 'edit_settings',
                'table_name' => 'settings',
                'created_at' => '2018-11-26 03:07:04',
                'updated_at' => '2018-11-26 03:07:04',
            ),
            23 => 
            array (
                'id' => 24,
                'key' => 'add_settings',
                'table_name' => 'settings',
                'created_at' => '2018-11-26 03:07:04',
                'updated_at' => '2018-11-26 03:07:04',
            ),
            24 => 
            array (
                'id' => 25,
                'key' => 'delete_settings',
                'table_name' => 'settings',
                'created_at' => '2018-11-26 03:07:04',
                'updated_at' => '2018-11-26 03:07:04',
            ),
            25 => 
            array (
                'id' => 26,
                'key' => 'browse_hooks',
                'table_name' => NULL,
                'created_at' => '2018-11-26 03:07:05',
                'updated_at' => '2018-11-26 03:07:05',
            ),
            26 => 
            array (
                'id' => 27,
                'key' => 'browse_products',
                'table_name' => 'products',
                'created_at' => '2018-12-15 18:36:06',
                'updated_at' => '2018-12-15 18:36:06',
            ),
            27 => 
            array (
                'id' => 28,
                'key' => 'read_products',
                'table_name' => 'products',
                'created_at' => '2018-12-15 18:36:06',
                'updated_at' => '2018-12-15 18:36:06',
            ),
            28 => 
            array (
                'id' => 29,
                'key' => 'edit_products',
                'table_name' => 'products',
                'created_at' => '2018-12-15 18:36:06',
                'updated_at' => '2018-12-15 18:36:06',
            ),
            29 => 
            array (
                'id' => 30,
                'key' => 'add_products',
                'table_name' => 'products',
                'created_at' => '2018-12-15 18:36:06',
                'updated_at' => '2018-12-15 18:36:06',
            ),
            30 => 
            array (
                'id' => 31,
                'key' => 'delete_products',
                'table_name' => 'products',
                'created_at' => '2018-12-15 18:36:06',
                'updated_at' => '2018-12-15 18:36:06',
            ),
            31 => 
            array (
                'id' => 32,
                'key' => 'browse_categorias',
                'table_name' => 'categorias',
                'created_at' => '2018-12-24 11:53:48',
                'updated_at' => '2018-12-24 11:53:48',
            ),
            32 => 
            array (
                'id' => 33,
                'key' => 'read_categorias',
                'table_name' => 'categorias',
                'created_at' => '2018-12-24 11:53:48',
                'updated_at' => '2018-12-24 11:53:48',
            ),
            33 => 
            array (
                'id' => 34,
                'key' => 'edit_categorias',
                'table_name' => 'categorias',
                'created_at' => '2018-12-24 11:53:48',
                'updated_at' => '2018-12-24 11:53:48',
            ),
            34 => 
            array (
                'id' => 35,
                'key' => 'add_categorias',
                'table_name' => 'categorias',
                'created_at' => '2018-12-24 11:53:48',
                'updated_at' => '2018-12-24 11:53:48',
            ),
            35 => 
            array (
                'id' => 36,
                'key' => 'delete_categorias',
                'table_name' => 'categorias',
                'created_at' => '2018-12-24 11:53:48',
                'updated_at' => '2018-12-24 11:53:48',
            ),
            36 => 
            array (
                'id' => 37,
                'key' => 'browse_cupoms',
                'table_name' => 'cupoms',
                'created_at' => '2018-12-27 15:07:11',
                'updated_at' => '2018-12-27 15:07:11',
            ),
            37 => 
            array (
                'id' => 38,
                'key' => 'read_cupoms',
                'table_name' => 'cupoms',
                'created_at' => '2018-12-27 15:07:11',
                'updated_at' => '2018-12-27 15:07:11',
            ),
            38 => 
            array (
                'id' => 39,
                'key' => 'edit_cupoms',
                'table_name' => 'cupoms',
                'created_at' => '2018-12-27 15:07:11',
                'updated_at' => '2018-12-27 15:07:11',
            ),
            39 => 
            array (
                'id' => 40,
                'key' => 'add_cupoms',
                'table_name' => 'cupoms',
                'created_at' => '2018-12-27 15:07:11',
                'updated_at' => '2018-12-27 15:07:11',
            ),
            40 => 
            array (
                'id' => 41,
                'key' => 'delete_cupoms',
                'table_name' => 'cupoms',
                'created_at' => '2018-12-27 15:07:11',
                'updated_at' => '2018-12-27 15:07:11',
            ),
        ));
        
        
    }
}