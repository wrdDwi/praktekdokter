<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pendaftaran extends Model
{
    //
    protected $table = "pendaftaran";
    protected $fillable =['no_daftar','kd_pasien','tgl_daftar','jam_praktek','status','create_date','create_by','modified_date','modified_by','is_deleted'];
}
