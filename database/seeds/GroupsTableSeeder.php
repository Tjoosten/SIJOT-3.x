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
            [
                'selector'      => 'kapoenen',
                'image_path'    => 'img/kapoenen_zeehondjes.svg',
                'heading'       => 'De Kapoenen',
                'sub_heading'   => 'van ... tot ... jaar'
            ], [
                'selector'      => 'welpen',
                'image_path'    => 'img/zeekabouters_welpen.svg',
                'heading'       => 'De Welpen',
                'sub_heading'   => 'van ... tot ... jaar'
            ], [
                'selector'      => 'jonggivers',
                'image_path'    => 'img/jonggiver.svg',
                'heading'       => 'De Jong-givers',
                'sub_heading'   => 'van ... tot ... jaar'
            ], [
                'selector'      => 'givers',
                'image_path'    => 'img/givers.svg',
                'heading'       => 'De Givers',
                'sub_heading'   => 'Van ... tot ... jaar'
            ], [
                'selector'      => 'jins',
                'image_path'    => 'img/jins_loodsen.svg',
                'heading'       => 'De Jins',
                'sub_heading'   => 'van ... tot ... jaar'
            ], [
                'selector'      => 'leiding',
                'image_path'    => 'img/leiding.svg',
                'heading'       => 'De Leiding',
                'sub_heading'   => 'van ... tot ... jaar'
            ],
        ];

        $table = DB::table('branches');
        $table->delete();
        $table->insert($data);
    }
}
