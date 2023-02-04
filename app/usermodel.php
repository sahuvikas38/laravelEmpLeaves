<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    protected $table ='stu_register';
    public $fillable = [
		'first_name', 'last_name','city_name', 'email',
	];
}
