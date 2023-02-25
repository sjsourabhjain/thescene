<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;
use App\Helpers\Helper;

class EventController extends Controller
{
    public function index(){
    	$data['events'] = Event::get();
    	$data['categories'] = Category::get();
    	return view('webviews/events', $data);
    }

    public function eventDetails(Request $request,$slug,$id){
    	$data['event'] = Event::where('id',$id)->first();
    	return view('webviews/event-details', $data);
    }

    public function store(Request $request){
    	/*$validator = $request->validate([
            'event_name'     => 'required|string|max:250',
            'price'     => 'required',
            'category_id'     => 'required'
        ],[],[
            'event_name'=>'Event Name',
            'price'=>'Event SKU ID',
            'category_id'=>'Category'
        ]);
    	if($validator->fails()){
    		return redirect()->back()->with('error',$validator->messages()->first());
        }*/
        try{
        	
            //$Event_details = Event::create($request->all());
            $events = new Event();
            $events->title = $request->event_name;
            $events->slug = str_replace(" ", "-", $request->event_name);
            $events->amount_status = $request->price;
            $events->category_id = $request->category_id;
            $events->save();
            return redirect()->back()->with('success', 'Event added Successfully');   
            //return redirect()->route('admin.list_event')->with('success','Event Added Successfully.');
        }catch(\Exception $e){
        	dd($e->getMessage());
            return redirect()->route('admin.dashboard')->with('error',$e);
        }
    }
    
}
