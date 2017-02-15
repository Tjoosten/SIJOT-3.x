<?php

use Illuminate\Database\Seeder;
use Sijot\RentalStatus;

class LeaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RentalStatus::create([
            'name'        => 'Nieuwe aanvraag',
            'label_class' => 'label-danger',
            'table_class' => 'danger',
            'description' => 'Word gebruikt om nieuwe aanvragen weer te geven'
        ]);

        RentalStatus::create([
            'name'        => 'Optie',
            'label_class' => 'label-warning',
            'table_class' => 'warning',
            'description' => 'Word gebruikt op verhurings opties weer te geven.'
        ]);

        RentalStatus::create([
            'name'        => 'Bevestigd',
            'label_class' => 'label-success',
            'table_class' => 'success',
            'description' => 'Word gebruikt om bevestigde verhuringen weer te geven.'
        ]);
    }
}
