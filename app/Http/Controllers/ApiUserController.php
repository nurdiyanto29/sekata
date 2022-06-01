<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\Response;
class ApiUserController extends Controller
{
    public function index()
    {
        $user = User::orderBy('id','ASC')->get();
        return response()->json($user, Response::HTTP_OK);
    }
}
