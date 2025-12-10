<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shopping;

class ShoppingController extends Controller
{
    public function index() {
        $items = Shopping::all();

        return view ('index', compact('items'));
    }

    public function store(Request $request) {
        Shopping::create($request->all());   
    
        return back();
    }
}
