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
        $response = Http::get('http://127.0.0.1:8000/api/tipe');
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
            ->post('http://127.0.0.1:8000/api/tipe', [
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
        $response = Http::get('http://127.0.0.1:8000/api/tipe/' . $id);
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
        $request->validate([
            'tipe_perform' => 'required',
            'harga_sewa' => 'required',
            'deskripsi' => 'required',
        ]);

        $tipe = Tipe::find($id);
        $tipe->tipe_perform = $request->get('tipe_perform');
        $tipe->harga_sewa = $request->get('harga_sewa');
        $tipe->deskripsi = $request->get('deskripsi');

        $tipe->save();
        return redirect()->route('tipe.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = Http::delete('http://127.0.0.1:8000/api/tipe/' . $id);
        $response->json();
        return redirect()->route('tipe.index');
    }
}
