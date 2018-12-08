<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use App\groupakses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{
    //
    public $successStatus = 200;
    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('dokterpraktek')->accessToken;
            $role=groupakses::where('user_id','=',$user['id'])->firstOrFail();
            $balikan =array(
                'userId'=>$user['id'],
                'name'=>$user['name'],
                'role'=>$role['role_id']
            );
            return response()->json(['status' => 1,'token'=>$success['token'],'user'=>$balikan ], $this->successStatus);
        } else {
            return response()->json(['status' => 0, 'msg'=>"username"], $this->successStatus);
        }

    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('dokterpraktek')->accessToken;
        $success['name'] = $user->name;
        return response()->json(['success' => $success], $this->successStatus);
    }
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }
}
