<?php

use Illuminate\Database\Seeder;

class DataTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('data_types')->delete();
        
        \DB::table('data_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'users',
                'slug' => 'users',
                'display_name_singular' => 'User',
                'display_name_plural' => 'Users',
                'icon' => 'voyager-person',
                'model_name' => 'TCG\\Voyager\\Models\\User',
                'policy_name' => 'TCG\\Voyager\\Policies\\UserPolicy',
                'controller' => '',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2018-11-26 03:07:00',
                'updated_at' => '2018-11-26 03:07:00',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'menus',
                'slug' => 'menus',
                'display_name_singular' => 'Menu',
                'display_name_plural' => 'Menus',
                'icon' => 'voyager-list',
                'model_name' => 'TCG\\Voyager\\Models\\Menu',
                'policy_name' => NULL,
                'controller' => '',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2018-11-26 03:07:00',
                'updated_at' => '2018-11-26 03:07:00',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'roles',
                'slug' => 'roles',
                'display_name_singular' => 'Role',
                'display_name_plural' => 'Roles',
                'icon' => 'voyager-lock',
                'model_name' => 'TCG\\Voyager\\Models\\Role',
                'policy_name' => NULL,
                'controller' => '',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2018-11-26 03:07:00',
                'updated_at' => '2018-11-26 03:07:00',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'products',
                'slug' => 'products',
                'display_name_singular' => 'Product',
                'display_name_plural' => 'Products',
                'icon' => 'voyager-bag',
                'model_name' => 'App\\Product',
                'policy_name' => NULL,
                'controller' => 'ProductController',
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null}',
                'created_at' => '2018-12-15 18:36:06',
                'updated_at' => '2018-12-24 12:04:15',
            ),
            4 => 
            array (
                'id' => 6,
                'name' => 'categorias',
                'slug' => 'categorias',
                'display_name_singular' => 'Categoria',
                'display_name_plural' => 'Categorias',
                'icon' => 'voyager-categories',
                'model_name' => 'App\\Categoria',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null}',
                'created_at' => '2018-12-24 11:53:48',
                'updated_at' => '2018-12-24 11:55:35',
            ),
            5 => 
            array (
                'id' => 7,
                'name' => 'cupoms',
                'slug' => 'cupoms',
                'display_name_singular' => 'Cupom',
                'display_name_plural' => 'Cupoms',
                'icon' => NULL,
                'model_name' => 'App\\Cupom',
                'policy_name' => NULL,
                'controller' => 'CupomController',
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null}',
                'created_at' => '2018-12-27 15:07:11',
                'updated_at' => '2018-12-27 15:07:56',
            ),
            6 => 
            array (
                'id' => 8,
                'name' => 'clientes',
                'slug' => 'clientes',
                'display_name_singular' => 'Cliente',
                'display_name_plural' => 'Clientes',
                'icon' => 'voyager-person',
                'model_name' => 'App\\Cliente',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null}',
                'created_at' => '2018-12-28 15:47:11',
                'updated_at' => '2019-04-03 06:40:38',
            ),
            7 => 
            array (
                'id' => 9,
                'name' => 'pedidos',
                'slug' => 'pedidos',
                'display_name_singular' => 'Pedido',
                'display_name_plural' => 'Pedidos',
                'icon' => 'voyager-bag',
                'model_name' => 'App\\Pedido',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null}',
                'created_at' => '2018-12-28 15:47:36',
                'updated_at' => '2019-04-03 06:38:18',
            ),
        ));
        
        
    }
}