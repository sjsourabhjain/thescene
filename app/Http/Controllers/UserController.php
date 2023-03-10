<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Hash,Mail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
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
                //echo "you are login successfully";
                return redirect()->route('profile');
            }else{
            }

        }catch(\Exception $e){
            echo $e->getMessage();die;
        }
    }

    public function register(Request $request){

        $validator = Validator::make($request->all(),[
            'name'  => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'min:6',
            'confirm_password' => 'required_with:password|same:password|min:6',
            'user_role' => 'required'
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
            $user->role_id = $request->user_role;
            $user->save();
            $to_name = $request->name;
            $to_email = $request->email;
            $data = array('name'=>$to_name, 'email' => $to_email);
            Mail::send('emails.email_verification', $data, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)
                ->subject('Email confirmation');
                $message->from('thescene@gmail.com','Test Mail');
            });
            return redirect()->route('login');
        }catch(\Exception $e){
            echo $e->getMessage();die;
        }
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }
}
