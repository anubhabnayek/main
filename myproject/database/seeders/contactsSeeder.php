<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\contact;

Use Faker\Factory as faker;
	
class contactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
      /*$data=new contact;
	  $data->name="anubhab nayek";
	  $data->email="anubhabnayek@gmail.com";
	  $data->comment="hello I am anubhab nayek";
	  $data->save();*/
	  $faker=Faker::create();
	  for($i=1;$i<5;$i++){
	  $data=new contact;
	  $data->name=$faker->name;
	  $data->email=$faker->email;
	  $data->comment="hi demo comment";
	  $data->save();
	  }
    }
}
