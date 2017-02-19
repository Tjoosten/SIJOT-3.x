<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['selector' => 'kapoenen',      'image_path' => 'img/'],
            ['selector' => 'welpen',        'image_path' => 'img/'],
            ['selector' => 'jonggivers',    'image_path' => 'img/'],
            ['selector' => 'givers',        'image_path' => 'img/'],
            ['selector' => 'jins',          'image_path' => 'img/'],
            ['selector' => 'leiding',       'image_path' => 'img/'],
        ];

        $table = DB::table('branches');
        $table->delete();
        $table->insert($data);
    }
}
