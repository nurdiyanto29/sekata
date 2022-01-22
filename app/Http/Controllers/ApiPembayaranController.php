<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class ApiPembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembayaran = Pembayaran::with('jadwal', 'user')->orderBy('id','desc')->get();
        return response()->json($pembayaran, Response::HTTP_OK);
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

        $validator = Validator::make(
            $request->all(),
            [
                'jadwal_id' => 'required',
                'bukti_bayar' => 'required',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }


        if ($file = $request->file('bukti_bayar')) {
            $request->file('bukti_bayar')->move('pembayaran/', $request->file('bukti_bayar')->getClientOriginalName());
            $file = $request->file('bukti_bayar')->getClientOriginalName();

            //store your file into database
            $bayar = new Pembayaran();
            $bayar->bukti_bayar = $file;
            $bayar->jadwal_id = $request->jadwal_id;
            $bayar->save();

            return response()->json($bayar, Response::HTTP_OK);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pembayaran = Pembayaran::with('jadwal')->findOrFail($id);
        return response()->json($pembayaran, Response::HTTP_OK);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        try {
            $pembayaran->delete();
            return response()->json($pembayaran, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "failed" . $e->errorInfo
            ]);
        }
    }
}
