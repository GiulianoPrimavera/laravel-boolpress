<?php
use App\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ["Astronomia", "Biologia", "Chimica", "Zoologia"];

        foreach ($categories as $category) {
            $new_category = new Category();
            $new_category->category = $category;
            $new_category->save();
        }
    }
}