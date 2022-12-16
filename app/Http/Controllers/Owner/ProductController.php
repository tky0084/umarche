<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Owner;
use App\Models\Product;
use App\Models\PrimaryCategory;
use App\Models\Shop;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:owners');

        $this->middleware(function($request, $next){ 
                $id = $request->route()->parameter('product'); 
                if(!is_null($id)){ 
                    $imagesOwnerId = Product::findOrFail($id)->shop->owner->id; 
                    $productId = (int)$productsOwnerId; // キャスト 文字列→数値に型変換 
                    if($productId !== Auth::id()){ 
                        abort(404); 
                    } 
                } 
                return $next($request); 
            });
    } 

    public function index()
    {
        // $products = Owner::findOrFail(Auth::id())->shop->product; //後ほど修正します
        
        $ownerInfo = Owner::with('shop.product.imageFirst')
        ->where('id', Auth::id())->get(); 
        
        //dd($ownerInfo);
        //foreach($ownerInfo as $owner){
            //dd($owner->shop->product);
            //foreach($owner->shop->product as $product){
            //    dd($product->imageFirst->filename);
           // }
        //}

        return view('owner.products.index', compact('ownerInfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shops = Shop::where('owner_id', Auth::id())
        ->select('id', 'name')
        ->get();

        $images = Image::where('owner_id', Auth::id())
        ->select('id', 'title', 'filename')
        ->orderBy('updated_at', 'desc')
        ->get();

        $categories = PrimaryCategory::with('secondary')->get();

        return view('owner.products.create', compact('shops', 'images', 'categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}