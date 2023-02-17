<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Variant;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductVariant;
use App\Models\ProductCategory;
use App\Models\ProductVariantImage;
use App\Models\ProductVariantCombination;
use App\Models\ProductVariantCombinationDetails;
use DataTables;

class ProductController extends Controller
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
            $data["products"] = Product::latest()->get();
            if ($request->ajax()) {
                return Datatables::of($data["products"])
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
                            $btn = '<a href="'.route('admin.show_product',$row['id']).'"><button type="button" class="icon-btn preview"><i class="fal fa-eye"></i></button></a>';
                            $btn .= '<a href="'.route('admin.edit_product',$row['id']) .'"><button type="button" class="icon-btn edit"><i class="fal fa-edit"></i></button></a>';
                            $btn .= '<a href="'.route('admin.manage_variants',$row['id']).'"><button type="button" class="icon-btn preview"><i class="fal fa-box"></i></button></a>';
                            return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
            }
            return view('admin.products.list_product');
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
            $data["variants"] = Variant::latest()->get();
            $data["categories"] = Category::latest()->get();
            return view('admin.products.add_product',$data);
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
            'product_name'     => 'required|string|max:250',
            'product_sku_id'     => 'required',
            'category_id'     => 'required'
        ],[],[
            'product_name'=>'Product Name',
            'product_sku_id'=>'Product SKU ID',
            'category_id'=>'Category'
        ]);

        try{
            $product_details = Product::create($request->all());

            if(!empty($request->category_id)){
                foreach($request->category_id as $category){
                    ProductCategory::create([
                        "product_id"=>$product_details->id,
                        "category_id"=>$category
                    ]);
                }
            }

            if(!empty($request->variants)){
                foreach($request->variants as $variant){
                    ProductVariant::create([
                        "product_id"=>$product_details->id,
                        "variant_id"=>$variant
                    ]);
                }
            }

            return redirect()->route('admin.list_product')->with('success','Product Added Successfully.');
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
            $data["product_details"] = Product::where(["id"=>$id])->with("variants","categories")->first();
            return view('admin.products.show_product',$data);
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
    public function edit($id){
        try{
            $data["variants"] = Variant::latest()->get();
            $data["categories"] = Category::latest()->get();
            $data["product_details"] = Product::where(["id"=>$id])->with("variants","categories")->first();
            return view('admin.products.edit_product',$data);
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
            'product_name'     => 'required|string|max:250',
            'product_sku_id'     => 'required',
            'category_id'     => 'required'
        ],[],[
            'product_name'=>'Product Name',
            'product_sku_id'=>'Product SKU ID',
            'category_id'=>'Category'
        ]);

        try{
            $update_arr["product_name"] = $request->product_name;
            $update_arr["product_sku_id"] = $request->product_sku_id;
            $product_details = Product::where(["id"=>$request->update_id])->update($update_arr);

            if(!empty($request->category_id)){
                ProductCategory::where(["product_id"=>$request->update_id])->delete();
                foreach($request->category_id as $category){
                    ProductCategory::create([
                        "product_id"=>$request->update_id,
                        "category_id"=>$category
                    ]);
                }
            }

            $variants_arr = [];
            if(!empty($request->variants)){
                ProductVariant::where(["product_id"=>$request->update_id])->delete();
                foreach($request->variants as $variant){
                    $variants_arr[] = $variant;
                    ProductVariant::create([
                        "product_id"=>$request->update_id,
                        "variant_id"=>$variant
                    ]);
                }
            }

            if(!empty($variants_arr)){
                ProductVariantCombinationDetails::where(["product_id"=>$request->update_id])->whereNotIn("variant_id",$variants_arr)->delete();
            }

            return redirect()->route('admin.list_product')->with('success','Product Updated Successfully.');
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
            Product::where(["id"=>$id])->delete();
            return redirect()->route('admin.list_product')->with('success','Product Deleted Successfully.');
        }catch(\Exception $e){
            return redirect()->route('admin.dashboard')->with('error',ERROR_MSG);
        }
    }
    public function manage_variants($id){
        try{
            $data["product_details"] = Product::where(["id"=>$id])->first();
            $data["product_variants"] = ProductVariant::where(["product_id"=>$id])->with("variantDetails")->get();
            $data["combinations"] = ProductVariantCombination::where(["product_id"=>$id])->with("combinationDetails")->latest()->get();
            return view('admin.products.manage_variants',$data);
        }catch(\Exception $e){
            return redirect()->route('admin.dashboard')->with('error',ERROR_MSG);
        }
    }
    public function manage_product_variant_images($comb_id,$product_id){
        try{
            $data["images"] = ProductVariantImage::where(["comb_id"=>$comb_id,"product_id"=>$product_id])->latest()->get();
            return view('admin.products.manage_product_variant_images',$data);
        }catch(\Exception $e){
            return redirect()->route('admin.dashboard')->with('error',ERROR_MSG);
        }
    }
    public function store_product_variant_images(Request $request){
        $validator = $request->validate([
            'comb_id'    => 'required|numeric',
            'product_id'    => 'required|numeric',
            'product_variant_image'     => 'required|image'
        ],[],[
            'comb_id'=>'Combination ID',
            'product_id'=>'Product ID',
            'product_variant_image'=>'Image',
        ]);

        try{
            $product_variant_image = '';

            $file = $request->file('product_variant_image');
            $originalname = $file->getClientOriginalName();
            $file_name = time()."_".$originalname;
            $file->move('uploads/product_variant_images/',$file_name);
            $product_variant_image = "product_variant_images/".$file_name;
            
            $request->request->add(['image_name' => $product_variant_image]);

            ProductVariantImage::create($request->all());
            return redirect()->route('admin.manage_product_variant_images',['comb_id'=>$request->comb_id,'product_id'=>$request->product_id])->with('success','Product Variant Image added Successfully.');
        }catch(\Exception $e){
            return redirect()->route('admin.dashboard')->with('error',ERROR_MSG);
        }
    }
    public function update_product_primay_variant(Request $request){
        try{
            $validator = Validator::make($request->all(),[
                'pvc_id'     => 'required|integer',
                'product_id'  => 'required|integer'
            ],[],[
                'pvc_id'=>'Variant ID',
                'product_id'=>'Product ID'
            ]);

            if($validator->fails()){
                return response()->json([
                    'status' => false,
                    'message' => $validator->messages()->first(),
                    'data'=>[]
                ]);
            }
            ProductVariantCombination::where(["product_id"=>$request->product_id])->update(["is_primary"=>0]);
            ProductVariantCombination::where(["id"=>$request->pvc_id])->update(["is_primary"=>1]);

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
    public function update_product_variant_primay_image(Request $request){
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
            ProductVariantImage::where(["comb_id"=>$request->comb_id])->update(["is_primary"=>0]);
            ProductVariantImage::where(["id"=>$request->id])->update(["is_primary"=>1]);

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
    public function list_product_variants($id)
    {
        try{
            $data["product_variants"] = ProductVariant::where(["product_id"=>$id])->with("variantDetails")->latest()->get();
            $data["combinations"] = ProductVariantCombinationDetails::where(["product_id"=>$id])->latest()->get();
            return view('admin.products.add_variants',$data);
        }catch(\Exception $e){
            return redirect()->route('admin.dashboard')->with('error',ERROR_MSG);
        }
    }
    public function store_product_variant(Request $request)
    {
        try{
            $pvc_details = ProductVariantCombination::create($request->all());
            if(!empty($request->variants)){
                foreach($request->variants as $variant_id=>$variant_value){
                    ProductVariantCombinationDetails::create([
                        "product_id"=>$request->product_id,
                        "pvc_id"=>$pvc_details->id,
                        "variant_id"=>$variant_id,
                        "variant_value"=>$variant_value
                    ]);
                }
            }

            return redirect()->route('admin.manage_variants',$request->product_id)->with('success','Product Variation Detailed added Successfully.');
       }catch(\Exception $e){
            return redirect()->route('admin.dashboard')->with('error',ERROR_MSG);
        }
    }
    public function delete_product_variant_image(Request $request,$id){
        try{
            $productImageQuery = ProductVariantImage::where(["id"=>$id]);
            $details = $productImageQuery->first();
            $productImageQuery->delete();
            unlink(public_path("/uploads/".$details->image_name));
            
            return redirect()->route('admin.manage_product_variant_images',['comb_id'=>$details->comb_id,'product_id'=>$details->product_id])->with('success','Product Variant Image removed Successfully.');
        }catch(\Exception $e){
            return redirect()->route('admin.dashboard')->with('error',ERROR_MSG);
        }
    }
}
?>