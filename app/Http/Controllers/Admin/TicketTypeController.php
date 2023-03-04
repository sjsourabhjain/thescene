<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\TicketType;
use DataTables;

class TicketTypeController extends Controller
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

            $data["tickettypes"] = TicketType::orderby('id', 'desc')->get();

            if ($request->ajax()) {
                return Datatables::of($data["tickettypes"])
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
                            $btn = '<a href="'.route('admin.edit_tickettype',$row['id']) .'"><button type="button" class="icon-btn edit"><i class="fa fa-edit"></i></button></a>';
                            return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
            }

            return view('admin.ticket_type.list_tickettype');

        }catch(\Exception $e){
            return redirect()->route('admin.dashboard')->with('error',ERROR_MSG);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            $data["tickettypes"] = TicketType::latest()->get();
            return view('admin.ticket_type.add_tickettype',$data);
        }catch(\Exception $e){
            return redirect()->route('admin.dashboard')->with('error',ERROR_MSG);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'event_type'     => 'required|string|max:200',
        ],[],[
            'event_type'=>'Event Type Name',
        ]);

        try{
            TicketType::create($request->all());
            return redirect()->route('admin.list_tickettype')->with('success','Event Type Added Successfully.');
        }catch(\Exception $e){
            echo $e->getMessage(); die;
            return redirect()->route('admin.dashboard')->with('error',$e);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $data["tickettypes"] = TicketType::where(["id"=>$id])->first();
            
            if(empty($data["tickettypes"])){
                return redirect()->route('admin.dashboard')->with('error',UNAUTHORIZED_ACCESS);
            }
            return view('admin.ticket_type.edit_tickettype',$data);
        }catch(\Exception $e){
            return redirect()->route('admin.dashboard')->with('error',ERROR_MSG);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = $request->validate([
            'event_type'     => 'required|string|max:200'
        ],[],[
            'event_type'=>'Event Type Name'
        ]);

        try{
            
            $update_arr["event_type"] = $request->event_type;

            $category_details = TicketType::where(["id"=>$request->update_id])->update($update_arr);
            return redirect()->route('admin.list_tickettype')->with('success','Ticket Type Updated Successfully.');
        }catch(\Exception $e){
            return redirect()->route('admin.dashboard')->with('error',ERROR_MSG);
        }
    }

}
