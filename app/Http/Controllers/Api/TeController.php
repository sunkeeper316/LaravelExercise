<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeController extends Controller
{
    public function te()
    {
        return response()->json(['status' => 'tetest',]);
    }
}