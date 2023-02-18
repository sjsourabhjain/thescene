<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventsController extends Controller
{
    public function index(Request $req)
    {
        $data['events'] = DB::table('events')
            ->when($req->categories_filter, function ($query, $categories_filter) {
                $query->whereIn('event_category', $categories_filter);
            })
            ->paginate(5);
        $data['categories'] = DB::table('event_categories')->get();
        return view('webview/events', $data);
    }


    public function eventDetails(Request $req)
    {
        if ($req->event_id) {
            $data['event'] = $token = DB::table('events')->where([['id', '=', $req->event_id],])->get()->first();
            return view('user/event-details', $data);
        }
    }
}
