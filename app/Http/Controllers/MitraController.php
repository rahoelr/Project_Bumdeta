<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.admin_mitra', [
            "title" => "| Mitra",
            "mitras" => Mitra::orderBy('mitra_name', 'asc')->paginate(10)
        ]);
    }

    public function adminView()
    {
        return view('admin.dashboard_admin_mitra', [
            "title" => "| Mitra",
            "mitras" => Mitra::orderBy('mitra_name', 'asc')->paginate(10)
        ]);
    }

    public function mitraView($owner)
    {
        return view('admin.dashboard_mitra_toko', [
            "title" => "| Mitra",
            'mitras' => Mitra::where('owner', $owner)->first()
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
            'title' => "| Mitra"
        );
        return view('admin.add_mitra')->with($data);
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
                'mitra_name' => 'required|unique:mitras,mitra_name|max:50',
                'owner' => 'required|max:30',
                't_o_business' => 'required|max:30',
                'address' => 'required|max:100'
            ]
        );
        if ($files = $request->file('images')) {
            $filenameWithExt = $files->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $files->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;
            $files->storeAs('public/mitra_images', $filenameSimpan);
            $image = $filenameSimpan;
        }
        $mitra = new Mitra;
        $mitra->images = $image;
        $mitra->mitra_name = $request->input('mitra_name');
        $mitra->owner = $request->input('owner');
        $mitra->t_o_business = $request->input('t_o_business');
        $mitra->address = $request->input('address');
        $mitra->save();
        if (Auth::user()->level == 'admin') {
            return redirect('db_admin-mitra')->with('success', 'Berhasil Menambah Mitra Baru!!');
        } else {
            return redirect('db_mitra-toko/' . Auth::user()->name)->with('success', 'Berhasil Menambah Mitra Baru!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('mitra', [
            'title' => "| Mitra",
            "mitras" => Mitra::orderBy('mitra_name', 'asc')->paginate(10)
        ]);
    }

    public function adminShow($id)
    {
        $data = array(
            'title' => "| Mitra",
        );
        $mitras = Mitra::find($id);
        return view('admin.admin_mitra', compact('mitras'))->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.edit_mitra', [
            'title' => "| Mitra",
            'mitras' => Mitra::find($id)
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
                'mitra_name' => 'required|max:50',
                'owner' => 'required|max:30',
                't_o_business' => 'required|max:30',
                'address' => 'required|max:100'
            ]
        );
        $mitra = Mitra::find($id);
        $mitra->mitra_name = $request->input('mitra_name');
        $mitra->owner = $request->input('owner');
        $mitra->t_o_business = $request->input('t_o_business');
        $mitra->address = $request->input('address');
        if ($files = $request->file('images')) {
            if ($mitra->images) {
                unlink('storage/mitra_images/' . $mitra->images);
            }
            $filenameWithExt = $files->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $files->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;
            $files->storeAs('public/mitra_images', $filenameSimpan);
            $image = $filenameSimpan;
        }
        $mitra->images = $image;
        $mitra->update();
        if (Auth::user()->level == 'admin') {
            return redirect('db_admin-mitra')->with('success', 'Berhasil Merubah Data Mitra!!');
        } else {
            return redirect('db_mitra-toko/' . Auth::user()->name)->with('success', 'Berhasil Merubah Data Mitra!!');
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
        $mitra = Mitra::find($id);
        if ($mitra->images) {
            unlink('storage/mitra_images/' . $mitra->images);
        }
        $mitra->delete();
        if (Auth::user()->level == 'admin') {
            return redirect('db_admin-mitra')->with('success', 'Berhasil Menghapus Data Mitra!!');
        } else {
            return redirect('db_mitra-toko/' . Auth::user()->name)->with('success', 'Berhasil Menghapus Data Mitra!!');
        }
    }

    public function __construct()
    {
        $this->middleware('auth', ["except" => ["show"]]);
    }
}
