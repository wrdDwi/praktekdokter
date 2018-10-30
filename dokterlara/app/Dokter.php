<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    //
    protected $table = "dokters";
	protected $fillable = ['nama', 'alamat','gender','kd_spesialis','tarif','create_at','create_by','modified_by','modified_at','is_deleted'];
}