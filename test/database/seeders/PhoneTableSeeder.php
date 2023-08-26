<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('phone')->insert( array(
            [   
                "title"=>"Iphone 14 pro max",
                "price"=>280000,
                "typephone_id"=>1
            ],  
            [
                "title"=>"Samsung Z Flip 5",
                "price"=>269000,
                "typephone_id"=>2
            ],
            [
                "title"=>"Nokia 3310",
                "price"=>200,
                "typephone_id"=>3
            ],
        ));
    }
}

