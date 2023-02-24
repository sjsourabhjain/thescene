<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;

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

    
}
