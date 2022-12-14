<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Mitra;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.admin_product', [
            "title" => "| Product",
            "products" => Product::orderBy('product_name', 'asc')->paginate(10)
        ]);
    }

    public function adminView()
    {
        return view('admin.dashboard_admin_product', [
            "title" => "| Product",
            "products" => Product::orderBy('product_name', 'asc')->paginate(10)
        ]);
    }

    public function mitraView($owner)
    {
        $mitras = Mitra::where('owner', $owner)->first();
        $mitra = "";
        if ($mitras != null) {
            $mitra = $mitras->mitra_name;
        }
        return view('admin.dashboard_mitra_product', [
            "title" => "| Product",
            "products" => Product::where('mitra', '=', $mitra)->orderBy('created_at', 'desc')->get()
        ]);
    }

    public function adminViewlatest()
    {
        return view('admin.dashboard_admin', [
            "title" => "| Dashboard",
            "products" => Product::orderBy('created_at', 'desc')->get()
        ]);
    }

    public function mitraViewlatest($owner)
    {
        $mitras = Mitra::where('owner', $owner)->first();
        $mitra = "";
        if ($mitras != null) {
            $mitra = $mitras->mitra_name;
        }
        return view('admin.dashboard_mitra', [
            "title" => "| Dashboard",
            "products" => Product::where('mitra', '=', $mitra)->orderBy('created_at', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title' => "| Product",
            "categories" => Category::orderBy('category', 'asc')->get(),
            "mitras" => Mitra::orderBy('mitra_name', 'asc')->get()
        );
        return view('admin.add_product')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'images' => 'required',
                'product_name' => 'required|unique:products,product_name|max:50',
                'category' => 'required|max:30',
                'price' => 'required|max:30',
                'mitra' => 'required|max:30',
                'p_number' => 'required|max:13',
                'description' => 'required'
            ]
        );
        $image = array();
        if ($files = $request->file('images')) {
            foreach ($files as $file) {
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $filenameSimpan = $filename . '_' . time() . '.' . $extension;
                $file->storeAs('public/product_images', $filenameSimpan);
                $image[] = $filenameSimpan;
            }
        }
        $product = new Product;
        $product->images = implode('|', $image);
        $product->product_name = $request->input('product_name');
        $product->category = $request->input('category');
        $product->price = $request->input('price');
        $product->description = nl2br($request->input('description'));
        $product->mitra = $request->input('mitra');
        $product->p_number = $request->input('p_number');
        $product->save();
        if (Auth::user()->level == 'admin') {
            return redirect('db_admin-product')->with('success', 'Berhasil Menambah Produk Baru!!');
        } else {
            return redirect('db_mitra-product/' . Auth::user()->name)->with('success', 'Berhasil Menambah Produk Baru!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function adminShow($id)
    {
        $data = array(
            'title' => "| Product",
        );
        $products = Product::find($id);
        if (!$products) abort(404);
        $images = $products->productImages;
        return view('admin.admin_product', compact('products', 'images'))->with($data);
    }

    public function list_product()
    {
        return view('produk', [
            "title" => "| Product",
            "categories" => Category::orderBy('category', 'asc')->get(),
            "products" => Product::orderBy('product_name', 'asc')->paginate(10)
        ]);
    }

    public function details_product($id)
    {
        return view('detail_produk', [
            'title' => "| Detail Product",
            "products" => Product::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.edit_product', [
            'title' => "| Product",
            'products' => Product::find($id),
            "categories" => Category::orderBy('category', 'asc')->get(),
            "mitras" => Mitra::orderBy('mitra_name', 'asc')->get()
        ]);
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
        $request->validate(
            [
                'images' => 'required',
                'product_name' => 'required|max:50',
                'category' => 'required|max:30',
                'price' => 'required|max:30',
                'mitra' => 'required|max:30',
                'p_number' => 'required|max:13',
                'description' => 'required'
            ]
        );
        $product = Product::find($id);
        $product->product_name = $request->input('product_name');
        $product->category = $request->input('category');
        $product->price = $request->input('price');
        $product->description = nl2br($request->input('description'));
        $product->mitra = $request->input('mitra');
        $product->p_number = $request->input('p_number');
        $image = array();
        if ($files = $request->file('images')) {
            if ($product->images) {
                $img = explode('|', $product->images);
                foreach ($img as $item) {
                    unlink('storage/product_images/' . $item);
                }
            }
            foreach ($files as $file) {
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $filenameSimpan = $filename . '_' . time() . '.' . $extension;
                $file->storeAs('public/product_images', $filenameSimpan);
                $image[] = $filenameSimpan;
            }
        }
        $product->images = implode('|', $image);
        $product->update();
        if (Auth::user()->level == 'admin') {
            return redirect('db_admin-product')->with('success', 'Berhasil Mengubah Data Produk!!');
        } else {
            return redirect('db_mitra-product/' . Auth::user()->name)->with('success', 'Berhasil Mengubah Data Produk!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product->images) {
            $image = explode('|', $product->images);
            foreach ($image as $item) {
                unlink('storage/product_images/' . $item);
            }
        }
        $product->delete();
        if (Auth::user()->level == 'admin') {
            return redirect('db_admin-product')->with('success', 'Berhasil Menghapus Produk!!');
        } else {
            return redirect('db_mitra-product/' . Auth::user()->name)->with('success', 'Berhasil Menghapus Produk!!');
        }
    }

    public function __construct()
    {
        $this->middleware('auth', ["except" => ["details_product", "list_product"]]);
    }
}
