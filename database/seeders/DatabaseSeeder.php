<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /**
         * create the admin user
         * admin@yopmail.com
         * Azerty123
         */
        User::factory(1)->create();

        /**
         * create the size type factory
         */
        DB::table('size_type')->insert([
            [
                'name'=>'Vêtement', //id = 1
            ],
            [
                'name'=>'Chaussure', //id = 2
            ]
        ]);

        /**
         * create the size factory
         */
        DB::table('size')->insert([
            //Vêtements
            [
                'name'=>'Small',
                'code'=>'S',
                'size_type_id'=>1
            ],
            [
                'name'=>'Medium',
                'code'=>'M',
                'size_type_id'=>1
            ],
            [
                'name'=>'Large',
                'code'=>'L',
                'size_type_id'=>1
            ],
            [
                'name'=>'Extra Large',
                'code'=>'XL',
                'size_type_id'=>1
            ],
            [
                'name'=>'Double Extra Large',
                'code'=>'XXL',
                'size_type_id'=>1
            ],

            //Chaussures
            [
                'name'=>'taille chaussure 36',
                'code'=>'36',
                'size_type_id'=>2
            ],
            [
                'name'=>'taille chaussure 37.5',
                'code'=>'37.5',
                'size_type_id'=>2
            ],
            [
                'name'=>'taille chaussure 38',
                'code'=>'38',
                'size_type_id'=>2
            ],
            [
                'name'=>'taille chaussure 39',
                'code'=>'39',
                'size_type_id'=>2
            ],
            [
                'name'=>'taille chaussure 40',
                'code'=>'40',
                'size_type_id'=>2
            ],
            [
                'name'=>'taille chaussure 41',
                'code'=>'41',
                'size_type_id'=>2
            ],
            [
                'name'=>'taille chaussure 42',
                'code'=>'42',
                'size_type_id'=>2
            ],
            [
                'name'=>'taille chaussure 43',
                'code'=>'43',
                'size_type_id'=>2
            ],
            [
                'name'=>'taille chaussure 44',
                'code'=>'44',
                'size_type_id'=>2
            ],
            [
                'name'=>'taille chaussure 45',
                'code'=>'45',
                'size_type_id'=>2
            ],
        ]);

    }
}
