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

    public function edit(Request $request) {
        $item = Shopping::find($request->key);
        
        return view('edit', compact('item'));
    }

    public function update(Request $request) {
        $item = $request->only(['name','quantity']);
        Shopping::find($request->key)->update($item);
        
        return redirect('/')->with('message', '保存しました');
    }

    public function destroy(Request $request) {
        Shopping::find($request->key)->delete();

        return back()->with('message', '削除しました');
    }

    public function search(Request $request) {
        $items = Shopping::query()
        ->nameSearch($request->name)
        ->quantitySearch($request->quantity)
        ->get();
       

        return view('index', compact('items'));
    }
}

