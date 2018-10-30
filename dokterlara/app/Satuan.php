<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    //
    protected $table = "satuans";
	protected $fillable = ['nama','create_at','create_by','modified_by','modified_at','is_deleted'];

}
