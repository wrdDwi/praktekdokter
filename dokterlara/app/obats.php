<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class obats extends Model
{
    //
	protected $fillable = ['nama', 'stok','harga_beli','harga_jual','kd_jenis','kd_satuan','create_at','create_by','modified_by','modified_at'];
}
