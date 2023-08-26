<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypephoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        DB::table('typephone')->insert( array(
            ["name"=>"Apple"],
            ["name"=>"Sumsung"],
            ["name"=>"Oppo"],
            ["name"=>"Huawei"],
            ["name"=>"Xiaomi"],
            ["name"=>"Nokia"],
        ));
    }
}
