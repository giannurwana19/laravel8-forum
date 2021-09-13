<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            ['name' => 'PHP', 'slug' => 'php'],
            ['name' => 'Javascript', 'slug' => 'javascript'],
            ['name' => 'Mobile Development', 'slug' => 'Mobile Development'],
            ['name' => 'Web Development', 'slug' => 'web-development'],
            ['name' => 'Tips Trick', 'slug' => 'tips-trick'],
            ['name' => 'Fashion', 'slug' => 'fashion'],
            ['name' => 'Social', 'slug' => 'social'],
            ['name' => 'Business', 'slug' => 'business'],
        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}
