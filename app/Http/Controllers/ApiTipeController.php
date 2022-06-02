<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Models\Tipe;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\Catch_;
use PhpParser\Node\Stmt\TryCatch;
use Svg\Tag\Path;
use Symfony\Component\HttpFoundation\Response;

class ApiTipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipe = Tipe::orderBy('time', 'DESC')->get();
        return response()->json($tipe, Response::HTTP_OK);
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
            'tipe_perform' => ['required'],
            'deskripsi' => ['required'],
            'cover' => ['required'],
            'harga_sewa' => ['required']
        ]);

        if ($validator->fails()) {
            return response()->json(
                $validator->errors(),
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
        if ($file = $request->file('cover')) {
            $request->file('cover')->move('tipe/', $request->file('cover')->getClientOriginalName());
            $file = $request->file('cover')->getClientOriginalName();

            //store your file into database
            $tipes = new Tipe();
            $tipes->cover = $file;
            $tipes->tipe_perform = $request->tipe_perform;
            $tipes->harga_sewa = $request->harga_sewa;
            $tipes->deskripsi = $request->deskripsi;
            $tipes->save();

            return response()->json($tipes, Response::HTTP_OK);
        }
        try {
            $tipe = Tipe::create($request->all());
            return response()->json($tipe, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "failed" . $e->errorInfo
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
        $tipe = Tipe::findOrFail($id);
        return response()->json($tipe, Response::HTTP_OK);
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
        try {
            $validator = Validator::make($request->all(), [
                'tipe_perform' => 'required',
                'deskripsi' => 'required',
                'harga_sewa' => 'required',

            ]);
            if ($validator->fails()) {
                return response()->json(
                    $validator->errors(),
                    Response::HTTP_UNPROCESSABLE_ENTITY);
            }
                else{
                    $tipes = Tipe::find($id);
                    $tipes->tipe_perform = $request->tipe_perform;
                    $tipes->harga_sewa = $request->harga_sewa;
                    $tipes->deskripsi = $request->deskripsi;
                    if($request->cover && $request->cover->isVaid()){
                        $file_name = time().'.'.$request->cover->extension();
                        $request ->cover->move(public_path('tipe'),$file_name);
                        $path = "public/tipe/$file_name";
                        $tipes->cover = $path;
                    }
                    $tipes->update();
                    return response()->json($tipes, Response::HTTP_OK);
                }

        }catch (QueryException $e) {
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


        $tipe = Tipe::findOrFail($id);
        $tipe->jadwal()->delete();
        $tipe->pembayaran()->delete();

        try {
            $tipe->delete();
            $jadwal=Jadwal::where('tipe_id',$id);
            $jadwal->delete();
            $pembayaran=Pembayaran::where('tipe_id', $$id);
            $pembayaran->delete();
            return response()->json($tipe, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "failed" . $e->errorInfo
            ]);
        }
    }
}
