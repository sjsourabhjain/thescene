<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth,Hash;
use App\Models\User;

class UserController extends Controller
{
    //
    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'email'      => 'required|email',
            'password'  => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status_code' => 400,
                'response' => 'error',
                'message' => $validator->messages()->first(),
            ]);
        }

        try{
            if(Auth::attempt(["email"=>$request->email,'password'=>$request->password])){
                echo "you are login successfully";
                //return redirect()->route('/');
            }else{
            }

        }catch(\Exception $e){
            echo $e->getMessage();die;
        }
    }

    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name'  => 'required',
            'email'      => 'required|email',
            'password'  => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status_code' => 400,
                'response' => 'error',
                'message' => $validator->messages()->first(),
            ]);
        }

        try{
            $user = new User;
            $user->full_name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role_id = 3;
            $user->save();
            return redirect()->route('login');
        }catch(\Exception $e){
            echo $e->getMessage();die;
        }
    }
}
