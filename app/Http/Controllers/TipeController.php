<?php

namespace App\Http\Controllers;

use App\Models\Tipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::get(\config('api.url').'tipe');
        $tipe = $response->json();
        return view('admin/tipe/index', compact('tipe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/tipe/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $foto = $request->cover;
        $namaFile = $foto->getClientOriginalName();
        $response = Http::attach('cover', file_get_contents($request->cover), $namaFile)
            ->post(\config('api.url').'tipe', [
                'tipe_perform' => $request->tipe_perform,
                'harga_sewa' => $request->harga_sewa,
                'deskripsi' => $request->deskripsi
            ]);
        $response->json();
        // dd($response);
        return redirect()->route('tipe.index');
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
        $response = Http::get(\config('api.url').'tipe/' . $id);
        $tipe = $response->json();
        return view('admin.tipe.edit', compact('tipe'));
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

        $tipe = Tipe::findorfail($id);
        $tipe->tipe_perform=$request->input('tipe_perform');
        $tipe->harga_sewa=$request->input('harga_sewa');
        $tipe->deskripsi=$request->input('deskripsi');

if($request->hasFile('cover')){
    $file = $request->file('cover');
    $extension = $file->getClientOriginalExtension();
    $filename= time().'.'.$extension;
    $file->move(public_path().'/tipe',$filename);
    $tipe->cover= $filename;
}

$tipe->save();

        return redirect()->route('tipe.index');
    }
    public function update_(Request $request, $id)
    {

        $ubah = Tipe::findorfail($id);
        $awal = $ubah->cover;

        $dt = [
            'tipe_perform' => $request ['tipe_perform'],
            'harga_sewa' => $request['harga_sewa'],
            'deskripsi' => $request['deskripsi'],
            'cover' => $awal
        ];

        $request->cover->move(public_path().'/tipe',$awal);
        $ubah->update($dt);

        return redirect()->route('tipe.index');
    }
    public function destroy($id)
    {
        $response = Http::delete(\config('api.url').'tipe/' . $id);
        $response->json();
        return redirect()->route('tipe.index');
    }
}
