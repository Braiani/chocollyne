<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menus')->delete();
        
        \DB::table('menus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'created_at' => '2018-11-26 03:07:01',
                'updated_at' => '2018-11-26 03:07:01',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'font-end',
                'created_at' => '2018-12-18 02:04:25',
                'updated_at' => '2018-12-18 02:04:25',
            ),
        ));
        
        
    }
}