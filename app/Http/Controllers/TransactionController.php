<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Http;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function api()
    {

        $response = Http::get('http://127.0.0.1:8000/api/transaction');
        $data = $response->json();
        dd($data);
    }

    // $client = new Transaction(); //GuzzleHttp\Client
    //     $url = "http://127.0.0.1:8000/api/transaction";


    //     $response = $client->request('GET', $url, [
    //         'verify'  => false,
    //     ]);

    //     $responseBody = json_decode($response->getBody());

    //     return view('transaction', compact('responseBody'));


    public function index()
    {

        $transaction = Transaction::with('categori')->get();

        $response = [
            'message' => 'List Data Transaksi by Waktu',
            'attributes' => $transaction
        ];

        // $transaction = Transaction::orderBy('time', 'DESC')->get();
        // $response = [
        //     'message' => 'List Data Transaksi by Waktu',
        //     'data' => $transaction
        // ];

        return response()->json($response, Response::HTTP_OK);
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
            'title' => ['required'],
            'amount' => ['required', 'numeric'],
            'type' => ['required', 'in:expense,revenue']

        ]);

        if ($validator->fails()) {
            return response()->json(
                $validator->errors(),
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        try {
            $transaction = Transaction::create($request->all());
            $response = [
                'message' => 'transaksi berhasil',
                'data' => $transaction
            ];

            return response()->json($response, Response::HTTP_CREATED);
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
        $transaction = Transaction::findOrFail($id);
        $response = [
            'message' => 'Detail transaksi',
            'data' => $transaction
        ];

        return response()->json($response, Response::HTTP_OK);
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

        $transaction = Transaction::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'title' => ['required'],
            'amount' => ['required', 'numeric'],
            'type' => ['required', 'in:expense,revenue']

        ]);

        if ($validator->fails()) {
            return response()->json(
                $validator->errors(),
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        try {
            $transaction->update($request->all());
            $response = [
                'message' => 'transaksi berhasil',
                'data' => $transaction
            ];

            return response()->json($response, Response::HTTP_OK);
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
        $transaction = Transaction::findOrFail($id);

        try {
            $transaction->delete();
            $response = [
                'message' => 'transaksi berhasil dihapus',
            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "failed" . $e->errorInfo
            ]);
        }
    }
}
