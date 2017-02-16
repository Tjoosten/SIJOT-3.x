<?php

use Illuminate\Database\Seeder;

class ThemesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seeding data.
        $themes = [
            ['name' => 'skin blue',         'class' => 'skin-blue'],
            ['name' => 'skin blue light',   'class' => 'skin-blue-light'],
            ['name' => 'skin yellow',       'class' => 'skin-yellow'],
            ['name' => 'skin yellow light', 'class' => 'skin-yellow-light'],
            ['name' => 'skin green',        'class' => 'skin-green'],
            ['name' => 'skin green light',  'class' => 'skin-green-light'],
            ['name' => 'skin purple',       'class' => 'skin-purple'],
            ['name' => 'skin purple light', 'class' => 'skin-purple-light'],
            ['name' => 'skin red',          'class' => 'skin-red'],
            ['name' => 'skin red light',    'class' => 'skin-red-light'],
            ['name' => 'skin black',        'class' => 'skin-black'],
            ['name' => 'skin black light',  'class' => 'skin-black-light']
        ];

        // Start seeding.
        $table = DB::table('themes');
        $table->delete();
        $table->insert($themes);
    }
}
