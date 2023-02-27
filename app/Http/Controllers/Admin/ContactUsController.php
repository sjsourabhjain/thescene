<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;
use DataTables;


class ContactUsController extends Controller
{
    public function index(Request $request){
        try{
            $data["contacts"] = ContactUs::orderby('id','desc')->get();
            if ($request->ajax()) {
                return Datatables::of($data["contacts"])
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
                            $btn .= '<a href="'.route('admin.delete_contactus',$row['id']) .'"><button type="button" class="icon-btn delete"><i class="fa fa-trash"></i></button></a>';

                            return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
            }
            return view('admin.contact_us.list_contactus');
        }catch(\Exception $e){
            return redirect()->route('admin.dashboard')->with('error',ERROR_MSG);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        try{
            ContactUs::where(["id"=>$id])->delete();
            return redirect()->route('admin.list_contactus')->with('success','Contact Deleted Successfully.');
        }catch(\Exception $e){
            return redirect()->route('admin.dashboard')->with('error',ERROR_MSG);
        }
    }
}
