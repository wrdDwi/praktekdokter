<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jenisObat extends Model
{
    //
    protected $table = "jenis_obats";
	protected $fillable = ['nama','create_at','create_by','modified_by','modified_at','is_deleted'];
}
