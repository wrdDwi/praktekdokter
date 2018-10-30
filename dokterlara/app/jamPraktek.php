<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jamPraktek extends Model
{
    //
    protected $table = "jam_prakteks";
	protected $fillable = ['waktu','create_at','create_by','modified_by','modified_at','is_deleted'];
}
