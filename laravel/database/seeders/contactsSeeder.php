<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\contact;

// now i use faker
Use Faker\Factory as faker;

class contactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// seeder
	    /*		
       $data=new contact;
	   $data->name="Ryan";
	   $data->email="Ryan@gmail.com";
	   $data->comment="Demo comment";
	   $data->save();
		*/
		
	   $faker= Faker::create();
	   for($i=1; $i<10;$i++)
	   {
	    $data=new contact;
		$data->name=$faker->name;
		$data->email=$faker->email;
		$data->comment="Hi demo comment";
		$data->save();
	   }
		
    }
}
