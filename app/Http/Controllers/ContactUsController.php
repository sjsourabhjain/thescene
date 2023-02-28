<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;

class ContactUsController extends Controller
{
    public function contact(Request $request){
        try{
            $contact = new ContactUs();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->subject = $request->subject;
            $contact->description = $request->message;
            $contact->save();
            return redirect()->back()->with('success', 'Your message has been saved successfully, our executive will revert you soon.');   
        }catch(\Exception $e){
        	dd($e->getMessage());
            return redirect()->route('admin.dashboard')->with('error',$e);
        }
    }
}
