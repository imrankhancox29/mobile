<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'item_name'=>'required',
            'item_description'=> 'required|string',
            'item_price' => 'required|integer'
            ]);
            $item = new Item([
            'mobile_name' => $request->get('item_name'),
            'mobile_desc'=> $request->get('item_description'),
            'mobile_price'=> $request->get('item_price')
            ]);
            $item->save();
            return redirect('/mobile')->with('success', 'Item has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $items = Item::find($id);
return view('items.edit', compact('items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'item_name'=>'required',
            'item_description'=> 'required|string',
            'item_price' => 'required|integer'
           ]);
           $item = Item::find($id);
           $item->mobile_name = $request->get('item_name');
           $item->mobile_desc = $request->get('item_description');
           $item->mobile_price = $request->get('item_price');
           $item->save();
           return redirect('/mobile')->with('success', 'Item has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $items = Item::find($id);
        $items->delete();
        return redirect('/mobile')->with('success', 'Item has been deleted 
       Successfully');
    }
}