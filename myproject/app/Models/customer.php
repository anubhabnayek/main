<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model

{
	//if you want customer table name
    //public $table="customer";
	//primary key/create_at & updated nahi chahiye
	//public $primarykey="customer_id";
	//if don't want then add: created_dt and updated_dt
	//public $timestamps=false;
	use HasFactory;
}
