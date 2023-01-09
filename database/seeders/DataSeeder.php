<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Data;
class DataSeeder extends Seeder
{



    public function run()
    {
        $faker=Faker::create();
        for($i=0; $i<75; $i++)
        {
            $data = new Data;
            $data->id = $i + 2115101001;
            $data->nama = $faker->name();
            $data->nilai = rand(60, 100);
            $data->save();
            

        } 
    }
}
