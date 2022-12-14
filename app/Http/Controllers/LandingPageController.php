<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use App\Models\Article;
use App\Models\Product;
use App\Models\Category;
use App\Models\LandingPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title' => "| Landing Page"
        );
        return view('admin.add_landingPageData')->with($data);
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
                'carousel' => 'required',
                'testimoni' => 'required'
            ]
        );
        $carousel = array();
        if ($files = $request->file('carousel')) {
            foreach ($files as $file) {
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $filenameSimpan = $filename . '_' . time() . '.' . $extension;
                $file->storeAs('public/landingPage_images', $filenameSimpan);
                $carousel[] = $filenameSimpan;
            }
        }
        $testimoni = array();
        if ($files = $request->file('testimoni')) {
            foreach ($files as $file) {
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $filenameSimpan = $filename . '_' . time() . '.' . $extension;
                $file->storeAs('public/landingPage_images', $filenameSimpan);
                $testimoni[] = $filenameSimpan;
            }
        }
        $landing = new LandingPage;
        $landing->carousel = implode('|', $carousel);
        $landing->testimoni = implode('|', $testimoni);
        $landing->save();
        return redirect('db_admin-landing/1')->with('success', 'Berhasil Menambah Produk Baru!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function adminView($id)
    {
        return view('admin.dashboard_admin_landing', [
            "title" => "| Landing Page",
            'landings' => LandingPage::find($id)
        ]);
    }

    public function publicView()
    {
        // $landing = LandingPage::where('id', 1)->get();
        // return dd($landing);
        return view('home', [
            "title" => "",
            "landings" => LandingPage::where('id', 1)->first(),
            "categories" => Category::orderBy('category', 'asc')->get(),
            "products" => Product::orderBy('created_at', 'desc')->get(),
            "mitras" => Mitra::orderBy('mitra_name', 'asc')->get(),
            "articles" => Article::orderBy('created_at', 'desc')->get()
        ]);
    }

    public function adminShow($id)
    {
        $data = array(
            'title' => "| Landing Page",
        );
        $landings = LandingPage::find($id);
        return view('admin.admin_landing', compact('landings'))->with($data);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.edit_landing', [
            'title' => "| Landing Page",
            'landings' => LandingPage::find($id)
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
                'carousel' => 'required',
                'testimoni' => 'required'
            ]
        );
        $landing = LandingPage::find($id);
        $carousel = array();
        if ($files = $request->file('carousel')) {
            if ($landing->carousel) {
                $img = explode('|', $landing->carousel);
                foreach ($img as $item) {
                    unlink('storage/landingPage_images/' . $item);
                }
            }
            foreach ($files as $file) {
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $filenameSimpan = $filename . '_' . time() . '.' . $extension;
                $file->storeAs('public/landingPage_images', $filenameSimpan);
                $carousel[] = $filenameSimpan;
            }
        }
        $testimoni = array();
        if ($files = $request->file('testimoni')) {
            if ($landing->testimoni) {
                $img = explode('|', $landing->testimoni);
                foreach ($img as $item) {
                    unlink('storage/landingPage_images/' . $item);
                }
            }
            foreach ($files as $file) {
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $filenameSimpan = $filename . '_' . time() . '.' . $extension;
                $file->storeAs('public/landingPage_images', $filenameSimpan);
                $testimoni[] = $filenameSimpan;
            }
        }
        $landing->carousel = implode('|', $carousel);
        $landing->testimoni = implode('|', $testimoni);
        $landing->update();
        return redirect('db_admin-landing/1')->with('success', 'Berhasil Merubah Data!!');
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

    public function __construct()
    {
        $this->middleware('auth', ["except" => ["publicView"]]);
    }
}
