<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    //
    protected $table = "pasiens";
    protected $fillable =['kd_pasien','nama_lengkap','tmp_lahir','tgl_lahir','gender','no_ktp','alamat','nama_ibu','no_telp','create_date','create_by','modified_date','modified_by','is_deleted'];
}
