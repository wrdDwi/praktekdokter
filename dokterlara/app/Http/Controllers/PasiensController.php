<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;

use App\PasienModel;

class PasiensController extends Controller
{
    //
    private $pasienModel = null;
    private function __construct()
    {
        $this->pasienModel = new PasienModel();
    }
    public function index()
    {

        return response()->json($this->pasienModel->getAllPasien(20), 200);
    }
    public function insert(Request $request)
    {
        $tanggal = date('Y-m-d H:i:s');
        $valid = $this->validations($request);
        if ($valid->fails()) {
            return response()->json($valid->errors(), 200);
        }

        $item = [
            'kd_pasien' => $request->post('pasienId'),
            'nama_lengkap' => $request->post('nama'),
            'tmp_lahir' => $request->post('tmpLahir'),
            'tgl_lahir' => $request->post('tglLahir'),
            'gender' => $request->post('gender'),
            'no_ktp' => $request->post('ktp'),
            'alamat' => $request->post('alamat'),
            'nama_ibu' => $request->post('namaIbu'),
            'no_telp' => $request->post('noTelp'),
            'create_date' => $tanggal,
            'is_deleted' => '0',
            'create_by' => $request->post('username')
        ];


        return response()->json($this->pasienModel->CreatePasien($item), 200);
    }
    public function update(Request $request, $id)
    {
        $tanggal = date('Y-m-d H:i:s');
        try {
            $valid = $this->validations($request);
            if ($valid->fails()) {
                return response()->json($valid->errors(), 200);
            }
           
            $item = new Pasien([
                'id_pasien'=>$id,
                'kd_pasien' => $request->post('pasienId'),
                'nama_lengkap' => $request->post('nama'),
                'tmp_lahir' => $request->post('tmpLahir'),
                'tgl_lahir' => $request->post('tglLahir'),
                'gender' => $request->post('gender'),
                'no_ktp' => $request->post('ktp'),
                'alamat' => $request->post('alamat'),
                'nama_ibu' => $request->post('namaIbu'),
                'no_telp' => $request->post('noTelp'),
                'modified_date' => $tanggal,
                'is_deleted' => '0',
                'modified_by' => $request->post('username')
            ]);
 
            return Response()->json($this->pasienModel->updatePasien($item), 200);
        } catch (\Exception $e) {
            return Response()->json($e->getMessage(), 200);
        }
    }
    public function delete($id)
    {
      

        return response()->json($this->pasienModel->updatePasien($id), 200);
    }
    private function validations(Request $request)
    {
        $rules = array(
            'nama' => 'required',
            'tmpLahir' => 'required',
            'tglLahir' => 'required',
            'nama' => 'required',
            'gender' => 'required|min:1',
            'ktp' => 'min:16',
            'alamat' => 'required',
            'namaIbu' => 'required',
            'noTelp' => 'required|min:6'
        );
        $validation = Validator::make($request->all(), $rules);
        return $validation;
    }
}
