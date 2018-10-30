<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Pasien;
class PasiensController extends Controller
{
    //
    public function index(){
        $pasien=Pasien::all();
        return response()->json($pasien,200);
    }
	public function insert(Request $request)
    {
        $tanggal=date('Y-m-d H:i:s');
        $valid=$this->validations($request);
        if ($valid->fails())
        {
                return response()->json($valid->errors(),200);
        }

        $item = new Pasien([
          'kd_pasien' => $request->post('pasienId'),
          'nama_lengkap' => $request->post('nama'),
		  'tmp_lahir'=>$request->post('tmpLahir'),
		  'tgl_lahir'=>$request->post('tglLahir'),
		  'gender'=>$request->post('gender'),
          'no_ktp'=>$request->post('ktp'),
          'alamat'=>$request->post('alamat'),
          'nama_ibu'=>$request->post('namaIbu'),
          'no_telp'=>$request->post('noTelp'),
          'create_date'=>$tanggal,
		  'is_deleted'=>'0',
		  'create_by'=>$request->post('username')
        ]);

        $item->save();
        return response()->json($item,200);
    }
    public function update(Request $request,$id){
        $tanggal=date('Y-m-d H:i:s');
        try{
            $valid=$this->validations($request);
            if ($valid->fails())
            {
                    return response()->json($valid->errors(),200);
            }   
            $pasien=Pasien::findOrFail($id);
            $item = new Pasien([
                'kd_pasien' => $request->post('pasienId'),
                'nama_lengkap' => $request->post('nama'),
                'tmp_lahir'=>$request->post('tmpLahir'),
                'tgl_lahir'=>$request->post('tglLahir'),
                'gender'=>$request->post('gender'),
                'no_ktp'=>$request->post('ktp'),
                'alamat'=>$request->post('alamat'),
                'nama_ibu'=>$request->post('namaIbu'),
                'no_telp'=>$request->post('noTelp'),
                'modified_date'=>$tanggal,
                'is_deleted'=>'0',
                'modified_by'=>$request->post('username')
              ]);
            $pasien->update($item);
            return Response()->json($pasien,200);
        }catch(\Exception $e){
            return Response()->json($e->getMessage(),200);
        }
       
        
    }
    public function delete($id){
        $obat = Pasien::findOrFail($id);
        $tanggal=date('Y-m-d H:i:s');
        $delete= new Pasien([
            'is_deleted'=>'1',
            'modified_date'=>$tanggal,
            
        ]);
        $obat->update($delete);

        return response()->json(null, 204);;
    }
    private function validations(Request $request){
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
