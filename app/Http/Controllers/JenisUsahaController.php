<?php

namespace App\Http\Controllers;

use App\Models\JenisUsaha;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class JenisUsahaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new Client();
        $url = "http://localhost/UAS_PSAIT_API/jenis_usaha_api.php";

        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);
        $responseBody = json_decode($response->getBody(), true);
        // dd($responseBody["data"]);
        return view('admin.dashboard_admin_jenisUsaha', [
            "title" => "| Jenis Usaha"
        ], compact('responseBody'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title' => "| Jenis Usaha"
        );
        return view('admin.add_jenisUsaha')->with($data);
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
                'jenisUsaha' => 'required|unique:jenis_usahas,jenisUsaha'
            ]
        );
        $client = new Client();
        $url = "http://localhost/UAS_PSAIT_API/jenis_usaha_api.php";
        $form_params = [
            'jenisUsaha'             => $request->input('jenisUsaha')
        ];
        $response = $client->request('POST', $url, [
            'form_params' => $form_params
        ]);
        $responseBody = json_decode($response->getBody(), true);
        return redirect('db_admin-jenis_usaha')->with('success', 'Berhasil Menambah Jenis Usaha Baru!!');
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

    public function adminShow($id)
    {
        $data = array(
            'title' => "| Jenis Usaha",
        );
        $client = new Client();
        $url = "http://localhost/UAS_PSAIT_API/jenis_usaha_api.php?id=" . $id;

        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);
        $responseBody = json_decode($response->getBody(), true);
        // dd($responseBody["data"]);
        return view('admin.admin_usaha', compact('responseBody'))->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = array(
            'title' => "| Jenis Usaha",
        );
        $client = new Client();
        $url = "http://localhost/UAS_PSAIT_API/jenis_usaha_api.php?id=" . $id;

        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);
        $responseBody = json_decode($response->getBody(), true);
        // dd($responseBody["data"]);
        return view('admin.edit_usaha', [
            'title' => "| Jenis Usaha"
        ], compact('responseBody'));
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
                'jenisUsaha' => 'required'
            ]
        );
        $client = new Client();
        $url = "http://localhost/UAS_PSAIT_API/jenis_usaha_api.php?id=" . $id;
        $form_params = [
            'jenisUsaha'             => $request->input('jenisUsaha')
        ];
        $response = $client->request('POST', $url, [
            'form_params' => $form_params
        ]);
        $responseBody = json_decode($response->getBody(), true);
        return redirect('db_admin-jenis_usaha')->with('success', 'Berhasil diupdate!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = new Client();
        $url = "http://localhost/UAS_PSAIT_API/jenis_usaha_api.php?id=" . $id;

        $response = $client->request('DELETE', $url, [
            'verify'  => false,
        ]);
        $responseBody = json_decode($response->getBody(), true);
        return redirect('db_admin-jenis_usaha')->with('success', 'Berhasil dihapus!!');
    }
}
