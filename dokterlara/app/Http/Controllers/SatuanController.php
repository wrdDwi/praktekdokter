<?php

namespace App\Http\Controllers;

use App\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $tanggal=date('Y-m-d H:i:s');
        $valid=$this->validations($request);
        if ($valid->fails())
        {
                return response()->json($valid->errors(),200);
        }
        $item = new Satuan([
          'nama' => $request->post('nama'),
          'is_deleted'=>'0',
		  'create_at'=> $tanggal,
		  'create_by'=>$request->post('username')
        ]);

        $item->save();
        return response()->json($item,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function show(Satuan $satuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $satuan=Satuan::findOrFail($id);
        //$jenisObat->update($request->all());
        return Response()->json($satuan,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $tanggal=date('Y-m-d H:i:s');
        $valid=$this->validations($request);
        if ($valid->fails())
        {
                return response()->json($valid->errors(),200);
        }
        $satuan=Satuan::findOrFail($id);
        $item = new Satuan([
            'nama' => $request->post('nama'),
            'is_deleted'=>'0',
            'modified_at'=> $tanggal,
            'modified_by'=>$request->post('username')
          ]);
        $satuan->update($item);
        return Response()->json($jenisObat,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $satuan=Satuan::findOrFail($id);
        $item = new Satuan([
            'is_deleted'=>'1',
            'modified_at'=> $tanggal,
            'modified_by'=>$request->post('username')
          ]);
        $satuan->update($item);
        return Response()->json($satuan,200);
    }
    private function validations(Request $request){
        $rules = array(
            'nama' => 'required',
            
            );
        $validation = Validator::make($request->all(), $rules);
        return $validation;
    }
}
