<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Offer;
use Hash;

class OfferController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        
    }
    public function index(Request $request){
        try{
            $data["offers"] = Offer::latest()->get();
            return view('admin.offer.list_offer',$data);
        }catch(\Exception $e){
            echo $e->getMessage(); die;
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
            return view('admin.offer.add_offer');
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
    public function store(Request $request){
        $validator = $request->validate([
            'coupon_code'     => 'required|string|max:250',
            'discount_type'     => 'required',
            'discount_value'     => 'required|string|max:250',
            'expiry_date' => 'required'
        ],[],[
            'coupon_code'     => 'Coupon Code',
            'discount_type'   => 'Discount Type',
            'discount_value'     => 'Discount Value',
            'expiry_date' => 'Expiry Date'
        ]);

        try{
            if(Offer::create($request->all())){
                return redirect()->route('admin.list_offer')->with('success','Offer Added Successfully.');
            }else{
                return redirect()->route('admin.list_offer')->with('error','Offer not added');
            }
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
    public function show($id)
    {
        try{
            $data["offer_details"] = Offer::where(["id"=>$id])->first();
            return view('admin.offer.show_offer',$data);
        }catch(\Exception $e){
            return redirect()->route('admin.dashboard')->with('error',ERROR_MSG);
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
            $data["offer_details"] = Offer::where(["id"=>$id])->firstOrFail();
            return view('admin.offer.edit_offer',$data);
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
            'coupon_code'     => 'required|string|max:250',
            'discount_type'     => 'required',
            'discount_value'     => 'required|string|max:250',
            'expiry_date' => 'required'
        ],[],[
            'coupon_code'     => 'Coupon Code',
            'discount_type'     => 'Discount Type',
            'discount_value'     => 'Discount Value',
            'expiry_date' => 'Expiry Date'
        ]);

        try{
            $user_details = Offer::where(["id"=>$request->update_id])->update($validator);
            return redirect()->route('admin.list_offer')->with('success','Offer Updated Successfully.');
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
            Offer::where(["id"=>$id])->delete();
            return redirect()->route('admin.list_Offer')->with('success','Offer Deleted Successfully.');
        }catch(\Exception $e){
            return redirect()->route('admin.dashboard')->with('error',ERROR_MSG);
        }
    }
}
?>