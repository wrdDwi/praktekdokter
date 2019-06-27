<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\pendaftaran;
use App\Pasien;
use App\jamPraktek;
class PendaftaranModel 
{
    //

    public function GetAllPendaftaran(){
        $pendaftaranData=[];
        $pendaftaran= pendaftaran::where('is_deleted',0)->get();
        if($pendaftaran){
            foreach($pendaftaran as $pd){
                $getPasien=Pasien::where([['is_deleted','=',0],['kd_pasien','=',$pd->kd_pasien]])->first();
                $getJampraktek=jamPraktek::where([['is_deleted','=',0],['id','=',$pd->jam_praktek]])->first();
              //  $getRekamMedis=
               $row=array(
                   'id_pendaftaran'=>$pd->id,
                   'no_pendaftaran'=>$pd->no_daftar,
                   'kd_pasien'=>$pd->kd_pasien,
                   'kd_rm'=>'',
                   'nama_pasien'=>$getPasien->nama_lengkap,
                   'tgl_daftar'=>$pd->tgl_daftar." ".$getJampraktek->waktu,
                   'status'=>$pd->status
               );
               array_push($pendaftaranData,$row);
            }
        }
        $collection = collect($pendaftaranData);
        return $collection->sortBy('no_pendaftaran');
    }
    public function CreatePendaftaran($array)
    {
        $jam = pendaftaran::create($array);
        if ($jam) {
            return ['status' => '1', 'Pendaftaran Sukses Di simpan Di database'];
        } else {
            return ['status' => '0', 'Pendaftaran gagal Di simpan Di database'];
        }
    } 
    public function updateStatusPendaftaran($array){
        $dt = Carbon::now();
        $id=$array['id_jam'];
        $array['modified_date']=$dt;
        unset($array['id_jam']);

        $updateJam = jamPraktek::where('id', '=', $id)->update($array);
        if ($updateJam) {
            return ['status' => '1', 'Jam praktek Sukses Di ubah'];
        } else {
            return ['status' => '0', 'Jam praktek gagal diubah'];
        }
        
    }
}
