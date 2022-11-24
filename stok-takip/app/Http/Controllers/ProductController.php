<?php

namespace App\Http\Controllers;

use App\Models\Products;
use DateTime;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     return view('Products');
    // }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['products'] = Products::all()->sortBy('created_at');

        return view('Products.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->file('image')) {
            $file = $request->file('image');
            $imageName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/images/products'),   $imageName);
        } else {
            $imageName =  "default.png";
        }

        $product = Products::insert([
            "name" => $request->name,
            "price" => $request->price,
            "stok" => $request->stock,
            "description" => $request->description,
            "image" => $imageName,
            "created_at" => new DateTime()
        ]);


        if ($product) {
            return redirect(route('products.index'))->with('success', 'İşlem Başarılı');
        }
        return back()->with('error', 'İşlem Başarısız');
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
        $product = Products::where('id', $id)->first();
        return view('Products.update', compact('product'));
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


        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $imageName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/images/products'),   $imageName);

            $path = 'images/blogs/' . $request->old_file;
            if (file_exists($path)) {
                @unlink(public_path($path));
            }
        } else {
            $imageName =  "default.png";
        }

        $productUpdate = Products::Where('id', $id)->update([
            "name" => $request->name,
            "stok" => $request->stok,
            "price" => $request->price,
            "description" => $request->description,
            "image" => $imageName,
            "created_at" =>  null,
            "updated_at" =>  new DateTime()
        ]);

        if ($productUpdate) {
            return redirect(route('products.index'))->with('success', 'Update İşlemi Başarılı');
        }
        return back()->with('error', 'İşlem Başarısız');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_image = Products::where('id', $id)->first();
        @unlink(public_path('/images/products' . $delete_image->image));

        $productDelete = Products::find(intval($id));
        if ($productDelete->delete()) {
            echo 1;
        }
        echo 0;
    }
}
