<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title' => "| Create Product",
            "categories" => Category::orderBy('category', 'asc')->get()
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
        return redirect('admin-products')->with('success', 'Berhasil Menambah Produk Baru!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = array(
            'title' => "| Product Picture",
        );
        $products = Product::find($id);
        if (!$products) abort(404);
        $images = $products->productImages;
        return view('admin.product_picture', compact('products', 'images'))->with($data);
    }

    public function list_product()
    {
        return view('produk', [
            'title' => "| Product",
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
            'title' => "Edit Product",
            'products' => Product::find($id),
            "categories" => Category::orderBy('category', 'asc')->get()
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
        return redirect('admin-products')->with('success', 'Berhasil diupdate!!');
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
        return redirect('admin-products')->with('success', 'Berhasil dihapus!!');
    }
}
