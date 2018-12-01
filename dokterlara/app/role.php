<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    //
    protected $table = "roles";
	protected $fillable = ['nama','create_at','create_by','modified_by','modified_at','is_deleted'];
}
