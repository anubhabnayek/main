<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\customer;
use Hash;

Use Faker\Factory as faker;

class customersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
		//Seeder
		/*$data=new customer;
		$data->name="prakash";
		$data->email="prakash@gmail.com";
	    $data->password=Hash::make('12345');
		$data->phone="656756766";
		$data->gender="male";
        $data->lag="hindi,english";
        $data->cid="1";
        $data->file=time().'_img.jpg';
		$data->save();
		*/
		$faker=Faker::create();
		for($i=1;$i<4;$i++){
		$data=new customer;
		$data->name=$faker->name;
		$data->email=$faker->email;
		$data->password=Hash::make($faker->password);
		$data->gender="Male";
		$data->lag="hindi,English,bengali";
		$data->phone="656756755";
		$data->cid="1";
        $data->file=time().'_img.jpg';
		$data->save();
		}
    }
}
