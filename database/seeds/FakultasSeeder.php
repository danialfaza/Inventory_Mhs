<?php

use Illuminate\Database\Seeder;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $listFakultas = ['Filkom', 'Vokasi', 'Hukum'];

        foreach ($listFakultas as $fakultas) {
        	Fakultas::create(['name' => $fakultas, 'photo' => 'dummy.png']);
    }
}
