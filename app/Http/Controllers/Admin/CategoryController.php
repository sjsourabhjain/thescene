<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Category;
use App\Models\TicketType;
use DataTables;
use Illuminate\Database\Eloquent\SoftDeletes;


class CategoryController extends Controller
{
    use SoftDeletes;

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
            $data["categories"] = Category::orderby('id', 'desc')->get();
            if ($request->ajax()) {
                return Datatables::of($data["categories"])
                        ->addIndexColumn()
                        ->addColumn('status', function($row){
                            if($row["status"]==1){
                                return '<a href="'.route("admin.update_category_status",$row['id']).'"><span class="badge badge-success">Active</span></a>';
                            }else{
                                return '<a href="'.route("admin.update_category_status",$row['id']).'"><span class="badge badge-warning">Inactive</span></a>';
                            }
                        })
                        ->addColumn('parent_id', function($row){
                            return $row->parent_id;
                        })
                        ->addColumn('category_name', function($row){
                            return $row->category_name;
                        })
                        // ->addColumn('category_image', function($row){
                        //     return "<img height='100' width='100' src='".asset("uploads/".$row["category_image"])."'>";
                        // })
                        ->addColumn('action', function($row){

                            $btn = '<a href="'.route('admin.edit_category',$row['id']) .'"><button type="button" class="icon-btn edit"><i class="fa fa-edit"></i></button></a> &nbsp;';

                            $btn .= '<a href="'.route('admin.delete_category',$row['id']) .'"><button type="button" class="icon-btn delete"><i class="fa fa-trash"></i></button></a>';

                            return $btn;
                        })
                        ->rawColumns(['status','action'])
                        ->make(true);
            }
            return view('admin.category.list_category');
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
            $data["categories"] = Category::latest()->get();
            $data["event_types"] = TicketType::latest()->get();
            return view('admin.category.add_category',$data);
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
            'category_name'     => 'required|string|max:250',
            'parent_id'     => 'required',
        ],[],[
            'category_name'=>'Category Name',
            'parent_id'=>'Parent Category',
        ]);

        try{
            Category::create($request->all());
            return redirect()->route('admin.list_category')->with('success','Category Added Successfully.');
        }catch(\Exception $e){
            echo $e->getMessage(); die;
            return redirect()->route('admin.dashboard')->with('error',$e);
        }
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     try{
    //         $data["category_details"] = Category::where(["id"=>$id])->first();
    //         return view('admin.category.show_category',$data);
    //     }catch(\Exception $e){
    //         return redirect()->route('admin.dashboard')->with('error',ERROR_MSG);
    //     }
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $data["category_details"] = Category::where(["id"=>$id])->first();
            $data["event_types"] = TicketType::latest()->get();
            
            if(empty($data["category_details"])){
                return redirect()->route('admin.dashboard')->with('error',UNAUTHORIZED_ACCESS);
            }
            return view('admin.category.edit_category',$data);
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
            'category_name'     => 'required|string|max:250',
            'parent_id'     => 'required'
        ],[],[
            'category_name'=>'Category Name',
            'parent_id' => 'Parent Id'
        ]);

        try{

            // $category_image = '';
            // if($request->hasFile('image_name')){
            //     $file = $request->file('image_name');
            //     $originalname = $file->getClientOriginalName();
            //     $file_name = time()."_".$originalname;
            //     $file->move('uploads/categories/',$file_name);
            //     $category_image = "categories/".$file_name;
            //     $update_arr["category_image"] = $category_image;
            // }

            $update_arr["parent_id"] = $request->parent_id;
            $update_arr["category_name"] = $request->category_name;
            // $update_arr["status"] = $request->status;

            $category_details = Category::where(["id"=>$request->update_id])->update($update_arr);
            return redirect()->route('admin.list_category')->with('success','Category Updated Successfully.');
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
            Category::where(["id"=>$id])->delete();
            return redirect()->route('admin.list_category')->with('success','Category Deleted Successfully.');
        }catch(\Exception $e){
            return redirect()->route('admin.dashboard')->with('error',ERROR_MSG);
        }
    }

    public function updateCategoryStatus($id){
        try{
            $user_details = Category::where(["id"=>$id])->first();

            $status = ($user_details->status==INACTIVE) ? ACTIVE : INACTIVE;

            $user_details->status = $status;
            $user_details->save();
            return redirect()->route('admin.list_category')->with('success','User Status Updated Successfully.');
        }catch(\Exception $e){
            return redirect()->route('admin.dashboard')->with('error',ERROR_MSG);
        }
    }
}
?>