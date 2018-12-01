<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class groupakses extends Model
{
    //
    protected $table = "groupakses";
	protected $fillable = ['user_id','role_id','create_at','create_by','modified_by','modified_at','is_deleted'];
}
