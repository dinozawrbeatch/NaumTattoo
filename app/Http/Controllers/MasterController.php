<?php

namespace App\Http\Controllers;

use App\Models\Master;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function index()
    {
        $masters = Master::all();
        return view('master.index', compact('masters'));
    }
}
