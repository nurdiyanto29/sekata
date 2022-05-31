<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::get(\config('api.url').'jadwal');
        $jadwal = $response->json();
        $response = Http::get(\config('api.url').'pembayaran');
        $data = $response->json();
        // dd($data);
        return view('admin/pembayaran/index',compact('data','jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response = Http::get(\config('api.url').'pembayaran/'. $id);
        $data = $response->json();
        return view('admin.pembayaran.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
    public function konfirmasi($id)
    {
        // $response = Http::get(\config('api.url').'jadwal/' . $id, [
        //     'status' => 'sudah bayar (terkonfirmasi)'
        // ]);
        // $response->json();
                $file = Jadwal::where('id',$id)->first();
                $file-> status = 'Sudah Bayar (Terkonfirmasi)';
                $file->save();
                return redirect()->route('pembayaran.index')
                ->with('Berhasil', 'Bukti Pembayaran Berhasil di Upload');;

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = Http::delete(\config('api.url').'pembayaran/' . $id);
        $response->json();
        return redirect()->route('pembayaran.index');
    }
}
