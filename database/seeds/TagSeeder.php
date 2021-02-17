<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['Php', 'Laravel', 'Javascript', 'React', 'Vue', 'Nextjs', 'Tailwindcss', 'Bootstrap'];

        foreach ($tags as $key => $tag) {
            DB::table('tags')->insert([
                'name' => $tag
            ]);
        }
    }
}
