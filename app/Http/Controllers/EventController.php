<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;
use App\Models\TicketType;
use App\Helpers\Helper;
use Auth;

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

    public function ticketBooking(Request $request,$slug){
        $data['event'] = Event::where('slug',$slug)->first();

        return view('webviews/ticket-booking', $data);
    }

    public function create(){
        $data['event_type'] = TicketType::get();
        return view('webviews/create-event',$data);
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
            $file = $request->file('image');
            $originalname = $file->getClientOriginalName();
            $file_name = time()."_".$originalname;
            $file->move('uploads/events/',$file_name);
            $image = "events/".$file_name;
            //$Event_details = Event::create($request->all());
            $events = new Event();
            $user_id = Auth::user()->id;
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
            $events->start_datetime = $request->price;
            $events->end_datetime = $request->price;

            $events->save();
            return redirect()->back()->with('success', 'Event added Successfully');   
            //return redirect()->route('admin.list_event')->with('success','Event Added Successfully.');
        }catch(\Exception $e){
        	dd($e->getMessage());
            return redirect()->route('admin.dashboard')->with('error',$e);
        }
    }
    
}
