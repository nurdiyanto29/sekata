<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Pembayaran;
use App\Models\Tipe;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::get('http://127.0.0.1:8000/api/jadwal');
        $data = $response->json();
        // dd($data);
        return view('admin/jadwal/index', compact('data'));
    }

    // $jadwal = Jadwal::with('tipe')->get();
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $inventariss = Inventaris::orderBy('id','asc')
        $user = User::orderBy('id', 'asc')->get();
        $response = Http::get('http://127.0.0.1:8000/api/tipe');
        $tipe = $response->json();
        return view('admin/jadwal/create', compact('tipe', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            //komentar http client post data
        $response = Http::post('http://127.0.0.1:8000/api/jadwal', [
            'tgl_perform' => $request->tgl_perform,
            'tipe_id' => $request->tipe_id,
            'user_id' => $request->user_id,
            'alamat' => $request->alamat,
            'jam' => $request->jam,
            'hp' => $request->hp,
            'acara' => $request->acara,
        ]);
        $response->json();

        return redirect()->route('jadwal.index',);
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
        $user = User::orderBy('id', 'asc')->get();
        $response = Http::get('http://127.0.0.1:8000/api/tipe');
        $tipe = $response->json();
        $response = Http::get('http://127.0.0.1:8000/api/jadwal/' . $id);
        $jadwal = $response->json();
        return view('admin.jadwal.edit', compact('jadwal', 'user', 'tipe'));
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

        $response = Http::put('http://127.0.0.1:8000/api/jadwal/' . $id, [
            'tgl_perform' => $request->tgl_perform,
            'tipe_id' => $request->tipe_id,
            'user_id' => $request->user_id,
            'alamat' => $request->alamat,
            'jam' => $request->jam,
            'hp' => $request->hp,
            'acara' => $request->acara
        ]);
        $response->json();
        // dd($response);
        return redirect()->route('jadwal.index');
    }
    /**}
     *
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // $data= Jadwal::findorfail($id);
        // $data->pembayaran()->delete();
        // $data->delete();
        $response = Http::delete('http://127.0.0.1:8000/api/jadwal/' . $id);
        $response->json();
        return redirect()->route('jadwal.index');
    }
}
