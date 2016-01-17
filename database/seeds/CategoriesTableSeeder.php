<?php

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
        for($i = 1; $i <= 4; $i++) {
            DB::table('categories')->insert([
                'name' => 'Catégorie_'.$i,
                'order' => $i,
            ]);
        }
    }
}
