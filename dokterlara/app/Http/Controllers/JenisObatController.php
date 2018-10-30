<?php

namespace App\Http\Controllers;

use App\jenisObat;
use Illuminate\Http\Request;

class JenisObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jenisobat =jenisObat::all();
        return response()->json($jenisobat) ;
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
        $tanggal=date('Y-m-d H:i:s');
        $valid=$this->validations($request);
        if ($valid->fails())
        {
                return response()->json($valid->errors(),200);
        }
        $item = new jenisObat([
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
     * @param  \App\jenisObat  $jenisObat
     * @return \Illuminate\Http\Response
     */
    public function show(jenisObat $jenisObat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\jenisObat  $jenisObat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $jenisObat=jenisObat::findOrFail($id);
        //$jenisObat->update($request->all());
        return Response()->json($jenisObat,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\jenisObat  $jenisObat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $jenisObat=jenisObat::findOrFail($id);
        $item = new jenisObat([
            'nama' => $request->post('nama'),
            'is_deleted'=>'0',
            'modified_at'=> $tanggal,
            'modified_by'=>$request->post('username')
          ]);
        $jenisObat->update($item);
        return Response()->json($jenisObat,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\jenisObat  $jenisObat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $jenisObat=jenisObat::findOrFail($id);
        $item = new jenisObat([
            'is_deleted'=>'1',
            'modified_at'=> $tanggal,
            'modified_by'=>$request->post('username')
          ]);
        $jenisObat->update($item);
        return Response()->json($jenisObat,200);
    }
    private function validations(Request $request){
        $rules = array(
            'nama' => 'required',
            
            );
        $validation = Validator::make($request->all(), $rules);
        return $validation;
    }
}
