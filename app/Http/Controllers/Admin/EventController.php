<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Event;
use App\Models\Category;
use App\Models\TicketType;
use DataTables;

class EventController extends Controller
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
            $data["events"] = Event::with('categories')->orderby('id', 'desc')->get();
            if ($request->ajax()) {
                return Datatables::of($data["events"])
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
                            $btn = '<a href="'.route('admin.show_event',$row['id']).'"><button type="button" class="icon-btn preview"><i class="fal fa-eye"></i></button></a>';
                            $btn .= '<a href="'.route('admin.edit_event',$row['id']) .'"><button type="button" class="icon-btn edit"><i class="fal fa-edit"></i></button></a>';
                            return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
            }
            return view('admin.events.list_event');
        }catch(\Exception $e){
            return redirect()->route('admin.dashboard')->with('error',ERROR_MSG);
        }
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        try{
            $data["categories"] = Category::latest()->get();
            return view('admin.events.add_event',$data);
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
            'event_name'     => 'required|string|max:250',
            'price'     => 'required',
            'category_id'     => 'required'
        ],[],[
            'event_name'=>'Event Name',
            'price'=>'Event SKU ID',
            'category_id'=>'Category'
        ]);

        try{
            //$Event_details = Event::create($request->all());
            $events = new Event();
            $events->title = $request->event_name;
            // $events->price = $request->price;
            // $events->category_id = $request->category_id;
            $events->save();
            return redirect()->route('admin.list_event')->with('success','Event Added Successfully.');
        }catch(\Exception $e){
            return redirect()->route('admin.dashboard')->with('error',$e);
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
            $data["event_details"] = Event::where(["id"=>$id])->with("categories")->first();
            return view('admin.events.show_event',$data);
        }catch(\Exception $e){
            return redirect()->route('admin.dashboard')->with('error',$e);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        try{
            $data["variants"] = Variant::latest()->get();
            $data["categories"] = Category::latest()->get();
            $data["Event_details"] = Event::where(["id"=>$id])->with("variants","categories")->first();
            return view('admin.events.edit_event',$data);
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
    public function update(Request $request){
        $validator = $request->validate([
            'Event_name'     => 'required|string|max:250',
            'Event_sku_id'     => 'required',
            'category_id'     => 'required'
        ],[],[
            'Event_name'=>'Event Name',
            'Event_sku_id'=>'Event SKU ID',
            'category_id'=>'Category'
        ]);

        try{
            $update_arr["Event_name"] = $request->Event_name;
            $update_arr["Event_sku_id"] = $request->Event_sku_id;
            $Event_details = Event::where(["id"=>$request->update_id])->update($update_arr);

            if(!empty($request->category_id)){
                EventCategory::where(["id"=>$request->update_id])->delete();
                foreach($request->category_id as $category){
                    EventCategory::create([
                        "id"=>$request->update_id,
                        "category_id"=>$category
                    ]);
                }
            }

            $variants_arr = [];
            if(!empty($request->variants)){
                EventVariant::where(["Event_id"=>$request->update_id])->delete();
                foreach($request->variants as $variant){
                    $variants_arr[] = $variant;
                    EventVariant::create([
                        "Event_id"=>$request->update_id,
                        "variant_id"=>$variant
                    ]);
                }
            }

            if(!empty($variants_arr)){
                EventVariantCombinationDetails::where(["Event_id"=>$request->update_id])->whereNotIn("variant_id",$variants_arr)->delete();
            }

            return redirect()->route('admin.list_event')->with('success','Event Updated Successfully.');
        }catch(\Exception $e){
            echo $e->getMessage(); die;
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
            Event::where(["id"=>$id])->delete();
            return redirect()->route('admin.list_Event')->with('success','Event Deleted Successfully.');
        }catch(\Exception $e){
            return redirect()->route('admin.dashboard')->with('error',ERROR_MSG);
        }
    }
    public function manage_variants($id){
        try{
            $data["Event_details"] = Event::where(["id"=>$id])->first();
            $data["Event_variants"] = EventVariant::where(["Event_id"=>$id])->with("variantDetails")->get();
            $data["combinations"] = EventVariantCombination::where(["Event_id"=>$id])->with("combinationDetails")->latest()->get();
            return view('admin.events.manage_variants',$data);
        }catch(\Exception $e){
            return redirect()->route('admin.dashboard')->with('error',ERROR_MSG);
        }
    }
    public function manage_Event_variant_images($comb_id,$Event_id){
        try{
            $data["images"] = EventVariantImage::where(["comb_id"=>$comb_id,"Event_id"=>$Event_id])->latest()->get();
            return view('admin.events.manage_event_variant_images',$data);
        }catch(\Exception $e){
            return redirect()->route('admin.dashboard')->with('error',ERROR_MSG);
        }
    }
    public function store_Event_variant_images(Request $request){
        $validator = $request->validate([
            'comb_id'    => 'required|numeric',
            'Event_id'    => 'required|numeric',
            'Event_variant_image'     => 'required|image'
        ],[],[
            'comb_id'=>'Combination ID',
            'Event_id'=>'Event ID',
            'Event_variant_image'=>'Image',
        ]);

        try{
            $Event_variant_image = '';

            $file = $request->file('Event_variant_image');
            $originalname = $file->getClientOriginalName();
            $file_name = time()."_".$originalname;
            $file->move('uploads/event_variant_images/',$file_name);
            $Event_variant_image = "event_variant_images/".$file_name;
            
            $request->request->add(['image_name' => $Event_variant_image]);

            EventVariantImage::create($request->all());
            return redirect()->route('admin.manage_event_variant_images',['comb_id'=>$request->comb_id,'id'=>$request->Event_id])->with('success','Event Variant Image added Successfully.');
        }catch(\Exception $e){
            return redirect()->route('admin.dashboard')->with('error',ERROR_MSG);
        }
    }
    public function update_Event_primay_variant(Request $request){
        try{
            $validator = Validator::make($request->all(),[
                'pvc_id'     => 'required|integer',
                'Event_id'  => 'required|integer'
            ],[],[
                'pvc_id'=>'Variant ID',
                'Event_id'=>'Event ID'
            ]);

            if($validator->fails()){
                return response()->json([
                    'status' => false,
                    'message' => $validator->messages()->first(),
                    'data'=>[]
                ]);
            }
            EventVariantCombination::where(["Event_id"=>$request->Event_id])->update(["is_primary"=>0]);
            EventVariantCombination::where(["id"=>$request->pvc_id])->update(["is_primary"=>1]);

            return response()->json([
                'status' => true,
                'message' => "Success",
                'data'=>[]
            ]);

        }catch(\Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'data'=>[]
            ]);
        }
    }
    public function update_Event_variant_primay_image(Request $request){
        try{
            $validator = Validator::make($request->all(),[
                'id'     => 'required|integer',
                'comb_id'     => 'required|integer',
            ],[],[
                'id'=>'ID',
                'comb_id'=>'Combination ID',
            ]);

            if($validator->fails()){
                return response()->json([
                    'status' => false,
                    'message' => $validator->messages()->first(),
                    'data'=>[]
                ]);
            }
            EventVariantImage::where(["comb_id"=>$request->comb_id])->update(["is_primary"=>0]);
            EventVariantImage::where(["id"=>$request->id])->update(["is_primary"=>1]);

            return response()->json([
                'status' => true,
                'message' => "Success",
                'data'=>[]
            ]);

        }catch(\Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'data'=>[]
            ]);
        }
    }
    public function list_Event_variants($id)
    {
        try{
            $data["Event_variants"] = EventVariant::where(["Event_id"=>$id])->with("variantDetails")->latest()->get();
            $data["combinations"] = EventVariantCombinationDetails::where(["Event_id"=>$id])->latest()->get();
            return view('admin.events.add_variants',$data);
        }catch(\Exception $e){
            return redirect()->route('admin.dashboard')->with('error',ERROR_MSG);
        }
    }
    public function store_Event_variant(Request $request)
    {
        try{
            $pvc_details = EventVariantCombination::create($request->all());
            if(!empty($request->variants)){
                foreach($request->variants as $variant_id=>$variant_value){
                    EventVariantCombinationDetails::create([
                        "Event_id"=>$request->Event_id,
                        "pvc_id"=>$pvc_details->id,
                        "variant_id"=>$variant_id,
                        "variant_value"=>$variant_value
                    ]);
                }
            }

            return redirect()->route('admin.manage_variants',$request->Event_id)->with('success','Event Variation Detailed added Successfully.');
       }catch(\Exception $e){
            return redirect()->route('admin.dashboard')->with('error',ERROR_MSG);
        }
    }
    public function delete_Event_variant_image(Request $request,$id){
        try{
            $EventImageQuery = EventVariantImage::where(["id"=>$id]);
            $details = $EventImageQuery->first();
            $EventImageQuery->delete();
            unlink(public_path("/uploads/".$details->image_name));
            
            return redirect()->route('admin.manage_Event_variant_images',['comb_id'=>$details->comb_id,'id'=>$details->Event_id])->with('success','Event Variant Image removed Successfully.');
        }catch(\Exception $e){
            return redirect()->route('admin.dashboard')->with('error',ERROR_MSG);
        }
    }
}
?>