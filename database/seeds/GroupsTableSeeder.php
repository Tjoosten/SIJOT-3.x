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
            ['selector' => 'kapoenen'],
            ['selector' => 'welpen'],
            ['selector' => 'jonggivers'],
            ['selector' => 'givers'],
            ['selector' => 'jins'],
            ['selector' => 'leiding'],
        ];

        $table = DB::table('branches');
        $table->delete();
        $table->insert($data);
    }
}
