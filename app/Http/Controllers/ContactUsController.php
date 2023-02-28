<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;

class ContactUsController extends Controller
{
    //
        public function contact(Request $request){
        try{
        	
            //$Event_details = Event::create($request->all());
            $contact = new ContactUs();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->subject = $request->subject;
            $contact->description = $request->message;
            $contact->save();
            return redirect()->back()->with('success', 'Contactus  Successfully');   
            //return redirect()->route('admin.list_event')->with('success','Event Added Successfully.');
        }catch(\Exception $e){
        	dd($e->getMessage());
            return redirect()->route('admin.dashboard')->with('error',$e);
        }
    }
}
