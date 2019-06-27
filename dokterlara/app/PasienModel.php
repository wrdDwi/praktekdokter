<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pasien;

class PasienModel
{
    //
    public function CreatePasien($array)
    {
        $pasien = Pasien::create($array);
        if ($pasien) {
            return ['status' => '1', 'Pasien Sukses Di simpan Di database'];
        } else {
            return ['status' => '0', 'Pasien gagal Di simpan Di database'];
        }
    }
    public function getAllPasien($pagesize = 20)
    {
        $pasienData = [];
        $allpasien = Pasien::where('is_delete', 0)->paginate($pagesize);
        if (sizeof($allpasien) > 0) {
            foreach ($allpasien as $pasien) {
                array_push(
                    $pasienData,
                    [
                        'id_pasien' => $pasien->id,
                        'kd_pasien' => $pasien->kd_pasien,
                        'nama_pasien' => $pasien->nama_lengkap,
                        'gender' => $pasien->gender,
                        'no_ktp' => $pasien->no_ktp,
                        'tmp_lahir' => $pasien->tmp_lahir,
                        'tgl_lahir' => $pasien->tgl_lahir->toDateTimeString(),
                        'alamat' => $pasien->alamat,
                        'telp' => $pasien->no_telp,
                        'alamat' => $pasien->alamat,
                        'nama_ibu' => $pasien->nama_ibu,
                        'create_date' => $pasien->create_date->toDateTimeString(),
                    ]

                );
            }
        }
        $collection = collect($pasienData);
        return $collection->sortBy('nama_lengkap');
    }
    public function getPasien($where)
    {
        $multiplewhere = [
            ['is_deleted', '=', 0]
        ];
        if (isset($where['nama_pasien'])) {
            array_push($multiplewhere, ['nama_lengkap', 'like', '%' . $where['nama_pasien'] . '%']);
        }
        if (isset($where['tgl_lahir'])) {
            array_push($multiplewhere, ['tgl_lahir'], '=', $where['tgl_lahir']);
        }
        if (isset($where['id_pasien'])) {
            array_push($multiplewhere, ['id'], '=', $where['id_pasien']);
        }
        if (isset($where['kd_pasien'])) {
            array_push($multiplewhere, ['kd_pasien'], '=', $where['kd_pasien']);
        }
        $pasiens = Pasien::where($multiplewhere)-> get();
        if (sizeof($pasiens) > 0) {
            foreach ($pasiens as $pasien) {
                array_push(
                    $pasienData,
                    [
                        'id_pasien' => $pasien->id,
                        'kd_pasien' => $pasien->kd_pasien,
                        'nama_pasien' => $pasien->nama_lengkap,
                        'gender' => $pasien->gender,
                        'no_ktp' => $pasien->no_ktp,
                        'tmp_lahir' => $pasien->tmp_lahir,
                        'tgl_lahir' => $pasien->tgl_lahir->toDateTimeString(),
                        'alamat' => $pasien->alamat,
                        'telp' => $pasien->no_telp,
                        'alamat' => $pasien->alamat,
                        'nama_ibu' => $pasien->nama_ibu,
                        'create_date' => $pasien->create_date->toDateTimeString(),
                    ]

                );
            }
        }
        $collection = collect($pasienData);
        return $collection->sortBy('nama_lengkap');
    }
    public function updatePasien($array)
    {
        $dt = Carbon::now();
        $id_pasien = $array['id_pasien'];
        unset($array['id_pasien']);
        $array['modified_date']=$dt;
        $updatePasien = Pasien::where('id', '=', $id_pasien)->update($array);
        if ($updatePasien) {
            return ['status' => '1', 'Pasien Sukses Di ubah'];
        } else {
            return ['status' => '0', 'Pasien gagal diubah'];
        }
    }
    public function deletePasien($id){
        $dt = Carbon::now();
        $set=[
            ['id_deleted','=','1'],
            ['modified_date','=', $dt]
        ];
        $updatePasien = Pasien::where('id', '=', $id)->update($set);
        if ($updatePasien) {
            return ['status' => '1', 'Pasien Sukses Di ubah'];
        } else {
            return ['status' => '0', 'Pasien gagal diubah'];
        }
    }
}
