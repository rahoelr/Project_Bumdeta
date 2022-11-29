<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title' => "| Create Mitra"
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
        return redirect('admin-mitras')->with('success', 'Berhasil Menambah Mitra Baru!!');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.edit_mitra', [
            'title' => "Edit Mitra",
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
        return redirect('admin-mitras')->with('success', 'Berhasil diupdate!!');
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
        return redirect('admin-mitras')->with('success', 'Berhasil dihapus!!');
    }
}
