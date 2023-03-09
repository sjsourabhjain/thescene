<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Category;
use App\Models\Event;
use App\Models\UserAddresses;
use App\Helpers\Helper;
use App\Models\ContactUs;
use JWTAuth;
use JWTAuthException;

class ApiController extends Controller
{
    public function register(Request $request){

        //Validate data
        $validator = Validator::make($request->all(),[
            'full_name'     => 'required|min:3|max:255',
            'email'  => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|numeric'
        ],[],[
            'email'=> 'Email',
            'full_name'=> 'Name',
            'password'=> 'Password',
            'role' => 'Role is required'
        ]);

        //Send failed response if request is not valid
        if($validator->fails()){
            return response()->json([
                    'status' => false,
                    'message' => $validator->messages()->first(),
                    'data'=>[]
                ]);
        }

        try{
            $userDetails = User::where(["mob_no"=>$request->mob_no])->first();
            $otp = "1234";
            if(!empty($userDetails) && $userDetails["is_otp_verified"]==1){
                return response()->json([
                    'status' => false,
                    'message' => 'User is already registered',
                    'data'=>[]
                ]);
            }elseif(!empty($userDetails) && $userDetails["is_otp_verified"]==0){
                // update the details
                // do not register a new user
                User::where(["mob_no"=>$request->mob_no])->update([
                    'email' => $request->email,
                    'otp'=>$otp,
                    'password' => bcrypt($request->password)
                ]);

                //Helper::sendOTP($request->mob_no,$otp);
                return response()->json([
                    'status' => true,
                    'message' => 'User created successfully',
                    'data'=>[]
                ]);
            }else{
                // register a new user

                User::create([
                    'full_name' => $request->full_name,
                    'email' => $request->email,
                    'otp' => $otp, //static
                    'role_id' => $request->role,
                    'password' => Hash::make($request->password)
                ]);

                //Helper::sendOTP($request->mob_no,$otp);

                //User created, return success response
                return response()->json([
                    'status' => true,
                    'message' => 'User created successfully',
                    'data'=>[]
                ]);
            }
        }catch(\Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'data'=>[]
            ]);
        }
    }

    public function forget_password(Request $request){
        //Validate data
        $validator = Validator::make($request->all(),[
            'email'     => 'required|email'
        ],[],[
            'email'=>'Email'
        ]);

        //Send failed response if request is not valid
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => $validator->messages()->first(),
                'data'=>[]
            ]);
        }

        try{
            $userDetails = User::where(["email"=>$request->email])->first();
            if(empty($userDetails)){
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid email',
                    'data'=>[]
                ]);
            }

            $otp = "1234";
            $userDetails->otp = $otp;
            $userDetails->save();
            return response()->json([
                'status' => true,
                'message' => 'Success!!',
                'data'=>[]
            ]);
        }catch(\Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'data'=>[]
            ]);
        }
    }


    public function reset_password(Request $request){
        //Validate data
        $validator = Validator::make($request->all(),[
            'password' => 'required|min:6',
            'user_id'  => 'required|integer'
        ],[],[
            'password'=>'Password'
        ]);

        //Send failed response if request is not valid
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => $validator->messages()->first(),
                'data'=>[]
            ]);
        }

        try{
            $userDetails = User::where("id", $request->user_id)->where("id", "!=", 1)->first();
            if(empty($userDetails)){
                return response()->json([
                    'status' => false,
                    'message' => 'No user found',
                    'data'=>[]
                ]);
            }

            $userDetails->password = Hash::make($request->password);
            $userDetails->save();
            return response()->json([
                'status' => true,
                'message' => 'Password reset successful.',
                'data'=>[]
            ]);
        }catch(\Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'data'=>[]
            ]);
        }
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'email'     => 'required',
            'password'  => 'required'
        ],[],[
            'email'=>'Email',
            'password'=>'Password',
        ]);

        //Send failed response if request is not valid
        if($validator->fails()){
            return response()->json([
                    'status' => false,
                    'message' => $validator->messages()->first(),
                    'data'=>[]
                ]);
        }

        try{
            //Request is valid, create new user
            $password = $request->password;
            $user_details = User::where(["email"=>$request->email])->first();
            if(empty($user_details)){
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid Details.',
                    'data'=>[]
                ]);                  
            }
            if(!Hash::check($password,$user_details->password)){
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid Details.',
                    'data'=>[]
                ]);
            }
            if($user_details["status"]==INACTIVE){
                return response()->json([
                    'status' => false,
                    'message' => 'User is Inactive. Please check with admin',
                    'data'=>[]
                ]);                
            }

            $token = JWTAuth::fromUser($user_details);
            $user_details->token = $token;
            $user_details->is_logged_in = 1;
            $user_details->save();

            //User created, return success response
            return response()->json([
                'status' => true,
                'message' => 'Login successfully.',
                'data'=>$user_details
            ]);
        }catch(\Exception $e){
            return response()->json([
                'status' => false,
                'message' => ERROR_MSG,
                'data'=>[]
            ]);
        }
    }


    public function categoryList(Request $request)
    {
        try{
            $main_categories = Category::where(["parent_id"=>0])->orderby('id', 'desc')->get();
            $categoryArr = [];
            if(!empty($main_categories)){
                foreach($main_categories as $main_category){
                    $sub_cats = [];
                    
                    $sub_categories = Category::where(["parent_id"=>$main_category->id])->orderby('id', 'desc')->get();
                    if(!empty($sub_categories)){
                        foreach($sub_categories as $sub_category){
                            $sub_cats[] = [
                                "category_id"=>$sub_category->id,
                                "category_name"=>$sub_category->category_name
                            ];
                        }
                    }

                    $categoryArr[] = [
                        "category_id"=>$main_category->id,
                        "category_name"=>$main_category->category_name,
                        // "sub_categories"=>$sub_cats
                    ];
                }
            }
            return response()->json([
                'status' => true,
                'message' => 'Category fetch successfully.',
                'data'=>$categoryArr
            ]);
        }
        catch(\Exception $e){
            return response()->json([
                'status' => false,
                'message' => ERROR_MSG,
                'data'=>[]
            ]);
        }     
    }

    
    public function userProfile(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'user_id' => 'required|numeric'
        ],[],[
            'user_id'=>'User ID'
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => $validator->messages()->first(),
                'data'=> []
            ]);
        }

        try{
            $data = User::where('id',$request->user_id)->first();
            return response()->json([
                'status' => true,
                'message' => 'User Details fetch successfully.',
                'data'=>$data
            ]);
        }
        catch(Exception $e){
            return response()->json([
                'status' => false,
                'message' => ERROR_MSG,
                'data'=>[]
            ]);
        }
    }

    public function userAddresses(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'user_id' => 'required|numeric'
        ],[],[
            'user_id'=>'User ID'
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => $validator->messages()->first(),
                'data'=> []
            ]);
        }

        try{
            $data = UserAddresses::where('user_id',$request->user_id)->get();
            return response()->json([
                'status' => true,
                'message' => '',
                'data'=>$data
            ]);
        }catch(\Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage().ERROR_MSG,
                'data'=>[]
            ]);
        }
    }
    

    public function store_user_address(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'user_id' => 'required|numeric',
            'title' => 'required',
            'name' => 'required',
            'line_one' => 'required',
            'line_two' => 'required',
            'city' => 'required',
            'zipcode' => 'required',
            'phone' => 'required',
            'email' => 'required'
        ],[],[
            'user_id'=>'User ID',
            'title' => 'Title',
            'name' => 'Name',
            'line_one' => 'Address Line one',
            'line_two' => 'Address Line two',
            'city' => 'city',
            'zipcode' => 'zipcode',
            'phone' => 'phone',
            'email' => 'email'
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => $validator->messages()->first(),
                'data'=> []
            ]);
        }

        try{
            $data = UserAddresses::create($request->all());
            return response()->json([
                'status' => true,
                'message' => 'User Address stored successfully',
                'data'=>[]
            ]);
        }
        catch(Exception $e){
            return response()->json([
                'status' => false,
                'message' => ERROR_MSG,
                'data'=>[]
            ]);
        }
    }

    public function update_profile(Request $request){

        $validator = Validator::make($request->all(),[
            'user_id' => 'required|numeric',
            'full_name' => 'required|min:3|max:255',
        ],[],[
            'user_id' => 'User ID',
            'full_name' => 'Full Name',
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => $validator->messages()->first(),
                'data'=> []
            ]);
        }

        try{

            $user = User::find($request->user_id);
            if(!empty($user))
            {
                User::where(["id"=>$request->user_id])->update([
                    "full_name"=>$request->full_name,
                ]);
                return response()->json([
                    'status' => true,
                    'message' => 'Profile Updated Successfully',
                    'data'=>[]
                ]); 

            }else{

                return response()->json([
                    'status' => false,
                    'message' => 'No user found',
                    'data'=>[]
                ]); 
            }

        }catch(Exception $e){
            return response()->json([
                'status' => false,
                'message' => ERROR_MSG.$e,
                'data'=>[]
            ]);
        }
    }

    //on api
    public function eventsList(Request $request)
    {
        $data = Event::where('status',1)->get();
        return response()->json([
                'status' => true,
                'message' => 'Event List fetch successfully.',
                'data'=>$data
            ]);
    }

    //on api
    public function eventDetail(Request $request)
    {
        $data = Event::where('id',$request->id)->with('categories')->first();
        return response()->json([
            'status' => true,
            'message' => 'Event List fetch successfully.',
            'data'=>$data
        ]);
    }

    public function createEvent(Request $request)
    {
        $validator = $request->validate([
            'event_name'     => 'required|string|max:250',
            'type'     => 'required',
            'category_id'     => 'required',
            'image'     => 'required',
            'location'     => 'required',
            'start_datetime' => 'required',
            'end_datetime' => 'required'
        ],[],[
            'event_name'     => 'Event Name',
            'type'     => 'Event Type',
            'category_id'     => 'Event Category',
            'image'     => 'Image',
            'location'     => 'Location',
            'start_datetime' => 'Event Start Date Time',
            'end_datetime' => 'Event End Date Time'
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => $validator->messages()->first(),
                'data'=> []
            ]);
        }
        try{
            $file = $request->file('image');
            $originalname = $file->getClientOriginalName();
            $file_name = time()."_".$originalname;
            $file->move('uploads/events/',$file_name);
            $image = "events/".$file_name;
            //$Event_details = Event::create($request->all());
            $events = new Event();
            //$user_id = Auth::user()->id;
            //$event->event_organizer_id = $user_id;
            $events->category_id = $request->category_id;
            $events->type = $request->type;
            $events->title = $request->event_name;
            $events->slug = str_replace(" ", "-", $request->event_name);
            $events->vip_seat = $request->vip_seat;
            $events->general_seat = $request->general_seat;
            $events->general_seat_price = $request->general_seat_price;
            $events->vip_seat_price = $request->vip_seat_price;
            $events->image = $image;
            $events->location = $request->location;
            $events->start_datetime = $request->start_datetime;
            $events->end_datetime = $request->end_datetime;

            $events->save();
            return response()->json([
                    'status' => true,
                    'message' => 'Event created Successfully',
                    'data'=>[]
                ]);   
        }catch(\Exception $e){
            return response()->json([
                'status' => false,
                'message' => ERROR_MSG.$e,
                'data'=>[]
            ]);
        }
    }

    public function contact(Request $request){
        try{
            $contact = new ContactUs();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->subject = $request->subject;
            $contact->description = $request->message;
            $contact->save();
            return response()->json([
                    'status' => true,
                    'message' => 'Contact Us created Successfully',
                    'data'=>[]
                ]);  
        }catch(\Exception $e){
            dd($e->getMessage());
            return redirect()->route('admin.dashboard')->with('error',$e);
        }
    }
}
?>