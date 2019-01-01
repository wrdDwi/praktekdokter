<?php

namespace App\Http\Controllers;

use App\obats;
use Illuminate\Http\Request;
use Validator;

class ObatController extends Controller
{
    //
    //private date $tanggal=date('Y-m-d H:i:s');

    public function index()
    {
        $obat = obats::all();
        return response()->json($obat);
    }
    public function insert(Request $request)
    {
        $tanggal = date('Y-m-d H:i:s');
        $valid = $this->validations($request);
        if ($valid->fails()) {
            return response()->json($valid->errors(), 200);
        }
        $item = new obats([
            'nama' => $request->post('nama'),
            'stok' => $request->post('stok'),
            'harga_beli' => $request->post('harga_beli'),
            'harga_jual' => $request->post('harga_jual'),
            'kd_jenis' => $request->post('kd_jenis'),
            'kd_satuan' => $request->post('kd_satuan'),
            'create_at' => $tanggal,
            'create_by' => $request->post('username'),
        ]);

        $item->save();
        return response()->json($item, 200);
    }
    public function update(Request $request, $id)
    {
        $obat = Obats::findOrFail($id);
        $item = new obats([
            'nama' => $request->post('nama'),
            'stok' => $request->post('stok'),
            'harga_beli' => $request->post('harga_beli'),
            'harga_jual' => $request->post('harga_jual'),
            'kd_jenis' => $request->post('kd_jenis'),
            'kd_satuan' => $request->post('kd_satuan'),
            'create_at' => $tanggal,
            'create_by' => $request->post('username'),
        ]);

        $obat->update($item);
        return Response()->json($obat, 200);
    }
    public function getObat($id){
        $obat = Obats::findOrFail($id);
        return Response()->json($obat, 200);

    }
    public function delete($id)
    {
        $obat = Obats::findOrFail($id);
        $item= new obats([
            'is_deleted'=>1
        ]);
        $obat->update($item);


        return response()->json(null, 204);
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
            'noTelp' => 'required|min:6',
        );
        $validation = Validator::make($request->all(), $rules);
        return $validation;
    }
}
