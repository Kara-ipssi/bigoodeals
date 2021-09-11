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
            ]


        ]);

        // validée, en préparation, expédiée
        DB::table('state')->insert([
            [
                'name'=> 'Validée',
                'description' => 'repprésente les commandes validées.'
            ],
            [
                'name'=> 'En préparation',
                'description' => 'repprésente les commandes en cours de préparation.'
            ],
            [
                'name'=>'Expédiée',
                'description'=>'Reresente les commandes expédiées.'
            ],
        ]);

        DB::table('category')->insert([
            [
                'name'=>'Vêtements',
                'image'=>'https://ae01.alicdn.com/kf/H41602049a01746dca97405de5200b6f1L/Ensemble-T-shirt-et-short-pour-hommes-surdimensionn-v-tements-de-sport-d-t-T-shirt.jpg_Q90.jpg_.webp',
                'created_at'=> now(),
            ],
            [
                'name'=>'Chaussures',
                'image'=>'https://ae01.alicdn.com/kf/H1dea52d9d4dd4ca1ae7ec889ad6117009/Speedcross-3-chaussures-d-ext-rieur-pour-hommes-baskets-de-course-de-marche-de-Jogging-de.jpg_Q90.jpg_.webp',
                'created_at'=> now(),
            ],
            [
                'name'=>'Manteaux',
                'image'=>'https://ae01.alicdn.com/kf/H7fa7bfd0abfe4cdd94e5a98d8a50c747H/Veste-coupe-vent-capuche-pour-hommes-manteau-la-mode-design-individuel-4XL.jpg_Q90.jpg_.webp',
                'created_at'=> now(),
            ]
        ]);

    }
}
