<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\jamPraktek;
class JamPraktekModel 
{
    //
    
    public function CreateJamPasien($array)
    {
        $jam = jamPraktek::create($array);
        if ($jam) {
            return ['status' => '1', 'Jam praktek Sukses Di simpan Di database'];
        } else {
            return ['status' => '0', 'Jam praktek gagal Di simpan Di database'];
        }
    } 
    public function GetAllJamPraktek(){
        $jampraktekData=[];
        $alljam= jamPraktek::where('is_delete',0)->get();
        if($alljam){
            foreach($alljam as $aj){
               $row=array(
                   'id_jam'=>$aj->id,
                   'waktu'=>$aj->waktu
               );
               array_push($jampraktekData,$row);
            }
        }
        $collection = collect($jampraktekData);
        return $collection->sortBy('waktu');
    }
    public function getJamPraktek($id)
    {
        $multiplewhere = [
            ['is_deleted', '=', 0],
            ['id', '=', $id]
        ];
        $jamPraktek = jamPraktek::where($multiplewhere)->first();
       
     return   $jamPraktek;
    }
    public function updateJamPraktek($array){
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
    public function deleteJampraktek($id){
        $dt = Carbon::now();
        $set=[
            ['id_deleted','=','1'],
            ['modified_date','=', $dt]
        ];
        $updatePasien = Pasien::where('id', '=', $id)->update($set);
        if ($updatePasien) {
            return ['status' => '1', 'PaJam Praktek Sukses Di hapus'];
        } else {
            return ['status' => '0', 'Jam Praktek gagal hapus'];
        }
    }
}
