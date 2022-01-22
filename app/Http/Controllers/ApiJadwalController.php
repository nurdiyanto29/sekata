<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

use Symfony\Component\HttpFoundation\Response;

class ApiJadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = Jadwal::with('tipe', 'user', 'pembayaran')->get();
        return response()->json($jadwal, Response::HTTP_OK);
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
        $validator = Validator::make($request->all(), [
            'tgl_perform' => ['required'],
            'alamat' => ['required'],
            'acara' => ['required'],
            'jam' => ['required'],
            'tipe_id' => ['required'],
            'user_id' => ['required'],
            'hp' => ['required']
        ]);

        if ($validator->fails()) {
            return response()->json(
                $validator->errors(),
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        try {
            $jadwal = Jadwal::create($request->all());
            // $response=[
            //     'message' => 'transaksi berhasil',
            // 'data' => $jadwal
            // ];
            // return response()->json($jadwal, Response::HTTP_OK);
            return response()->json($jadwal, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json([
                $e->errorInfo
            ]);
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
        $jadwal = Jadwal::with('user', 'tipe')->findOrFail($id);
        // $response=[
        //     'message' => 'Detail transaksi',
        // 'data' => $jadwal
        // ];

        return response()->json($jadwal, Response::HTTP_OK);
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

        $jadwal = Jadwal::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'tgl_perform' => ['required'],
            'tipe_id' => ['required'],
            'acara' => ['required'],
            'jam' => ['required'],
            'user_id' => ['required'],
            'alamat' => ['required'],
            'hp' => ['required']

        ]);

        if ($validator->fails()) {
            return response()->json(
                $validator->errors(),
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        try {
            $jadwal->update($request->all());
            return response()->json($jadwal, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "failed" . $e->errorInfo
            ]);
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
        $jadwal = Jadwal::findOrFail($id);
  $jadwal->pembayaran()->delete();

        try {
            $jadwal->delete();
            return response()->json($jadwal, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "failed" . $e->errorInfo
            ]);
        }
    }
}
