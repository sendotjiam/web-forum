<?php

use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
            'name' => 'Web Development',
            'slug' => 'web-development'
        ]);

        DB::table('subjects')->insert([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        DB::table('subjects')->insert([
            'name' => 'Mobile Development',
            'slug' => 'mobile-development'
        ]);

        DB::table('subjects')->insert([
            'name' => 'Java Programming',
            'slug' => 'java-programming'
        ]);

        DB::table('subjects')->insert([
            'name' => 'UI/UX',
            'slug' => 'ui-ux'
        ]);
    }
}
