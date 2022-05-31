<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class PesananController extends Controller
{
    public function index()
    {
        return view('user/pesanan/index');
    }

    public function pesanan($id)
    {
        // $response = Http::post(\config('api.url').'jadwal', [
        //     'tgl_perform' => $request->tgl_perform,
        //     'tipe_id' => $request->tipe_id,
        //     'user_id' => $request->user_id,
        //     'alamat' => $request->alamat
        // ]);
        // $response->json();

// return redirect()->route('jadwal.index');
        $response = Http::get(\config('api.url').'jadwal/'.$id);
        $data = $response->json();
        dd($data);
        // return view('user/pesanan/index',compact('data'));
    }



}
