<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Inventory extends Controller
{
    public function new()
    {
        return view('inventory/new');
    }
    public function store(Request $request)
    {
       // dd($request);
       dd($request);
    }
}
