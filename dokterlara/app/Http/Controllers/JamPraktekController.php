<?php

namespace App\Http\Controllers;

use App\jamPraktek;
use Illuminate\Http\Request;
use App\JamPraktekModel;
use Carbon\Carbon;

class JamPraktekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $jamModel = null;
    private $tanggal=null;
    private function __construct()
    {
        $this->jamModel = new JamPraktekModel();
        $this->tanggal=Carbon::now();
    }
    public function index()
    {
      
        return response()->json( $this->jamModel->GetAllJamPraktek(),200) ;
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
		  'create_at'=> $this->tanggal,
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

        
        return Response()->json($this->jamModel->getJamPraktek($id),200);
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
       
        $item =[
            'id_jam'=>$id,
            'waktu' => $request->post('jam'),
           'modified_at'=>$this->tanggal,
            'modified_by'=>$request->post('username')
          ];
      
        return Response()->json($this->jamModel->updateJamPraktek($item),200);
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
      
       
        return Response()->json($this->jamModel->deleteJampraktek($id),204);
    }
    private function validations(Request $request){
        $rules = array(
            'jam' => 'required',
            
            );
        $validation = Validator::make($request->all(), $rules);
        return $validation;
    }
}
