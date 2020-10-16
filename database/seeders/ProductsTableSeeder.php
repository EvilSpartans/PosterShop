<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Star Wars',
            'slug'=>'starwars',
            'detail'=>'Premier film de la saga',
            'price'=>10,
            'description'=>'Star wars épisode un : La Menace Fantôme ! Découvrez les origines de la saga.',
            'category_id'=> Category::all()->random()->id
        ]);

        Product::create([
            'name' => 'Creed',
            'slug'=>'creed',
            'detail'=>'L\'héritage de Rocky',
            'price'=>11,
            'description'=>'Le fils d\'Appolo Creed se fait entraîner par Rocky pour se faire un nom.',
            'category_id'=> Category::all()->random()->id
        ]);

        Product::create([
            'name' => 'Avenger',
            'slug'=>'avenger',
            'detail'=>'Equipe de super héros Marvel',
            'price'=>12,
            'description'=>'Les plus grands héros de l\'univers Marvel font équipe pour combattre une menace venue de l\'espace.',
            'category_id'=> Category::all()->random()->id
        ]);

        Product::create([
            'name' => 'Retour vers le futur',
            'slug'=>'retour',
            'detail'=>'Film culte',
            'price'=>13,
            'description'=>'Découvrez le premier volet de la saga populaire aux côtés de Marty et ses amis !',
            'category_id'=> Category::all()->random()->id
        ]);

        Product::create([
            'name' => 'Jurassic Park',
            'slug'=>'jurrasic',
            'detail'=>'Le park des dinosaures',
            'price'=>14,
            'description'=>'Partez à la découverte d\'un monde perdu et rencontrez les espèces disparues.',
            'category_id'=> Category::all()->random()->id
        ]);

        Product::create([
            'name' => 'Titanic',
            'slug'=>'titanic',
            'detail'=>'Histoire tragique du Titanic',
            'price'=>15,
            'description'=>'Découvrez comment le Titanic à sombré dans l\océan et quels étaient ses passagers !',
            'category_id'=> Category::all()->random()->id
        ]);

        Product::create([
            'name' => 'Avatar',
            'slug'=>'avatar',
            'detail'=>'Le monde de Pandora',
            'price'=>16,
            'description'=>'Une équipe part à la connaissance de la culture des habitants de cette planète.',
            'category_id'=> Category::all()->random()->id
        ]);

        Product::create([
            'name' => 'Resident Evil',
            'slug'=>'resident',
            'detail'=>'Invasion de zombies',
            'price'=>17,
            'description'=>'Un virus à contaminé la population, les survivants combattent pour survivre.',
            'category_id'=> Category::all()->random()->id
        ]);
    }
}
