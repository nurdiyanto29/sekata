<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Models\Jadwal;
use App\Models\Pembayaran;
use PDF;

class HomeController extends Controller
{
    public function index()
    {
        $response = Http::get(\config('api.url').'tipe');
        $data = $response->json();
        // dd($data);
        return view('home', compact('data'));
    }
    public function jadwalperform()
    {
        $response = Http::get(\config('api.url').'jadwal');
        $data = $response->json();
        // dd($data);
        return view('user.jadwal', compact('data'));
    }
    public function tipe()
    {
        $response = Http::get(\config('api.url').'tipe');
        $data = $response->json();
        // dd($data);
        return view('tipe', compact('data'));
    }
    public function about()
    {
        return view('about');
    }
    public function sewa($id)
    {  $response = Http::get(\config('api.url').'jadwal');
        $kalender = $response->json();
        $response = Http::get(\config('api.url').'tipe/' . $id);
        $data = $response->json();
        // dd($data);
        return view('user.sewa', compact('data','kalender'));
    }


    public function bayar($id)
    {
        $pesanan = Jadwal::where('id', $id)->get();
        return view('user.pesanan.bayar', compact('pesanan'));
        // dd($pesanan);
    }
    public function bayarstore(Request $request)
    {

        $mediaAtt = $request->bukti_bayar;
        $namaFile = $mediaAtt->getClientOriginalName();
        $response = Http::attach('bukti_bayar', file_get_contents($request->bukti_bayar), $namaFile)
            ->post(\config('api.url').'pembayaran', [
                'jadwal_id' => $request->jadwal_id,
                'bukti_bayar' => $request->bukti_bayar,
                'tipe_id' => $request->tipe_id
            ]);
        $response->json();
        //  dd($response);
        return redirect()->route('tiketku')
            ->with('success', 'Data berhasil ditambahkan');
    }
    public function store(Request $request)
    {
        $request->validate([
            'tgl_perform' => ['required',  'max:255', 'unique:jadwals']
        ]);
        $response = Http::post(\config('api.url').'jadwal', [
            'tgl_perform' => $request->tgl_perform,
            'tipe_id' => $request->tipe_id,
            'user_id' => $request->user_id,
            'alamat' => $request->alamat,
            'jam' => $request->jam,
            'acara' => $request->acara,
            'hp' => $request->hp
        ]);
        $response->json();
        $idUser = auth()->user()->id;
        $pesanan = jadwal::where('user_id', $idUser)
            ->orderBy('created_at', 'DESC')->first();
        return redirect()->route('user.bayar', $pesanan);
    }

    public function tiketku()
    {
        $id = auth()->user()->id;
        // $response = Http::get(\config('api.url').'jadwal/' , $id);
        // $pesanan = $response->json();
        $pesanan = Jadwal::where('user_id', $id)->orderby('created_at', 'DESC')->get();
        return view('user.pesanan.tiket', compact('pesanan'));
        // dd($pesanan);
    }
    public function destroy($id)
    {
        $response = Http::delete(\config('api.url').'jadwal/' . $id);
        $response->json();
        return redirect()->route('tiketku');
    }
    public function pdf($id){
        $pesanan = Jadwal::where('id',$id)->get();
        $pdf = PDF::loadview('e_nota',['pesanan'=>$pesanan]);
        return $pdf->download('nota.pdf');
     }
}
