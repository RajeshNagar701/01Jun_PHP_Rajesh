<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\customer;
use Hash;


// now i use faker
Use Faker\Factory as faker;

class customersSeeder extends Seeder
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
	   $data=new customer;
	   $data->name="Ryan";
	   $data->email="Ryan@gmail.com";
	   $data->username="Ryan701@gmail.com";
	   $data->password=Hash::make('1234');
	   $data->gen="Male";
	   $data->lag="Hindi,English";
	   $data->mobile="975154887";
	   $data->cid="1";
	   $data->file=time().'_img.jpg';
	   $data->save();	
	   */
		
	   $faker= Faker::create();
	   for($i=1; $i<10;$i++)
	   {		   
		   $data=new customer;
		   $data->name=$faker->name;
		   $data->email=$faker->email;
		   $data->username=$faker->username;
		   $data->password=Hash::make($faker->password);
		   $data->gen="Male";
		   $data->lag="Hindi,English";
		   $data->mobile="1234567891";
		   $data->cid="1";
		   $data->file=time().'_img.jpg';
		   $data->save();
	   }	   
    }
}
