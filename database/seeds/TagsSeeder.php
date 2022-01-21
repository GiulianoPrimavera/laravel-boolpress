<?php

use Illuminate\Database\Seeder;
use App\Tag;
class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ["green", "biology", "science", "future", "astronomy"];

        foreach ($tags as $tag) {
            $newTag = new Tag();

            $newTag->name = $tag;
            $newTag->save();
        }
    }
}
