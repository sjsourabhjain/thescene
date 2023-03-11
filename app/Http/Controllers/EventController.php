<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;
use App\Models\TicketType;
use App\Helpers\Helper;
use Auth,Validator;

class EventController extends Controller
{
    public function index(Request $request){

        // $data['events'] = Event::when($request->categories_filter, function ($query, $categories_filter) {
        //     $query->whereIn('category_id', $categories_filter);
        // })
        // ->paginate(10);

        if(!empty($request->categories_filter)){
            $data['events'] = Event::whereIn('category_id', $request->categories_filter)->paginate(1);
        }else{
            $data['events'] = Event::with('categories')->get();
        }
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
        $data['categories'] = Category::get();
        return view('webviews/create-event',$data);
    }

    public function store(Request $request){
    	/*$validator = $request->validate([
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
        ]);*/

        $validator = Validator::make($request->all(),[
            'event_name'     => 'required|string|max:250',
            'type'     => 'required',
            'category_id'     => 'required',
            'image'     => 'required',
            'location'     => 'required',
            'start_datetime' => 'required',
            'end_datetime' => 'required'
        ]);
    	if($validator->fails()){
    		return redirect()->back()->with('error',$validator->messages()->first());
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
            return redirect()->back()->with('success', 'Event added Successfully');   
            //return redirect()->route('admin.list_event')->with('success','Event Added Successfully.');
        }catch(\Exception $e){
        	dd($e->getMessage());
            return redirect()->route('admin.dashboard')->with('error',$e);
        }
    }
    
}
