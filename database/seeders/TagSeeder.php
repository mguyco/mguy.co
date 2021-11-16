<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;
use File;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::truncate();

        $tags = json_decode(File::get('database/data/tags.json'));

        foreach($tags as $tag) {
            Tag::create([
                'name' => $tag->name,
                'description' => $tag->description,
                'url' => $tag->url,
                'photo' => $tag->photo,
                'isVendor' => $tag->isVendor
            ]);
        }
    }
}
