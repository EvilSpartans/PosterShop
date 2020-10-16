<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        Category::insert([
            [
                'name'=>'Action',
                'slug'=>'action',
                'created_at'=> $now,
                'updated_at'=> $now
            ],
            [
                'name'=>'Horreur',
                'slug'=>'horreur',
                'created_at'=> $now,
                'updated_at'=> $now
            ],
            [
                'name'=>'Catastrophe',
                'slug'=>'catastrophe',
                'created_at'=> $now,
                'updated_at'=> $now
            ],
            [
                'name'=>'Science-fiction',
                'slug'=>'science-fiction',
                'created_at'=> $now,
                'updated_at'=> $now
            ],
            [
                'name'=>'Policier',
                'slug'=>'policier',
                'created_at'=> $now,
                'updated_at'=> $now
            ],
            [
                'name'=>'Historique',
                'slug'=>'historique',
                'created_at'=> $now,
                'updated_at'=> $now
            ],
            [
                'name'=>'Romantique',
                'slug'=>'romantique',
                'created_at'=> $now,
                'updated_at'=> $now
            ],
            [
                'name'=>'Comédie',
                'slug'=>'comédie',
                'created_at'=> $now,
                'updated_at'=> $now
            ],
            [
                'name'=>'Animation',
                'slug'=>'animation',
                'created_at'=> $now,
                'updated_at'=> $now
            ],
            [
                'name'=>'Dramatique',
                'slug'=>'dramatique',
                'created_at'=> $now,
                'updated_at'=> $now
            ],
            [
                'name'=>'Documentaire',
                'slug'=>'documentaire',
                'created_at'=> $now,
                'updated_at'=> $now
            ]
        ]);
    }
}
