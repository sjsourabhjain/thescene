<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\SellTicket;
use DataTables;


class SellTicketController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        
    }

    public function index(Request $request)
    {
        try{
            $data["tickets"] = SellTicket::orderby('id', 'desc')->get();
            if ($request->ajax()) {
                return Datatables::of($data["tickets"])
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
                            $btn = '<a href="'.route('admin.show-sell-ticket',$row['id']).'"><button type="button" class="icon-btn preview"><i class="fal fa-eye"></i></button></a>';
                            // $btn .= '<a href="'.route('admin.edit_event',$row['id']) .'"><button type="button" class="icon-btn edit"><i class="fal fa-edit"></i></button></a>';
                            // $btn .= '<a href="'.route('admin.manage_variants',$row['id']).'"><button type="button" class="icon-btn preview"><i class="fal fa-box"></i></button></a>';
                            return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
            }

            return view('admin.sell_ticket.list_sell_ticket');

        }catch(\Exception $e){
            return redirect()->route('admin.dashboard')->with('error',ERROR_MSG);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){

        try{

            $data["sellticket_details"] = SellTicket::where(["id"=>$id])->with("categories")->first();
            return view('admin.events.show_sell_ticket',$data);

        }catch(\Exception $e){
            return redirect()->route('admin.dashboard')->with('error',ERROR_MSG);
        }
    }
}
