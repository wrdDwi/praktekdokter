<?php

namespace App\Http\Controllers;

use App\jamPraktek;
use Illuminate\Http\Request;

class JamPraktekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jam =jamPraktek::where("is_deleted",0)->get();
        return response()->json($jam) ;
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

   
    public function store(Request $request)
    {
        //
        $tanggal=date('Y-m-d H:i:s');
        $valid=$this->validations($request);
        if ($valid->fails())
        {
                return response()->json($valid->errors(),200);
        }
        $item = new jamPraktek([
          'waktu' => $request->post('jam'),
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
     * @param  \App\jamPraktek  $jamPraktek
     * @return \Illuminate\Http\Response
     */
    public function show(jamPraktek $jamPraktek)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\jamPraktek  $jamPraktek
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $jam=jamPraktek::findOrFail($id);
        
        return Response()->json($jam,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\jamPraktek  $jamPraktek
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $jam=jamPraktek::findOrFail($id);
        $item = new jenisObat([
            'waktu' => $request->post('jam'),
            'is_deleted'=>'0',
            'modified_at'=> $tanggal,
            'modified_by'=>$request->post('username')
          ]);
        $jam->update($item);
        return Response()->json($jam,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\jamPraktek  $jamPraktek
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $jam=jamPraktek::findOrFail($id);
        $item = new jamPraktek([
            'is_deleted'=>'1',
            'modified_at'=> $tanggal,
            'modified_by'=>$request->post('username')
          ]);
        $jam->update($item);
        return Response()->json(null,204);
    }
    private function validations(Request $request){
        $rules = array(
            'jam' => 'required',
            
            );
        $validation = Validator::make($request->all(), $rules);
        return $validation;
    }
}
