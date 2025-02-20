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
            'name' => 'required',
            'description' => 'required',
        ]);

        Item::create($request->only(['name', 'description']));
        return redirect()->route('items.index')->with('succes', 'Item added succesfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('items.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $item)
    {
        $request->validate([
            'name'=> 'required',
            'description' => 'required',
        ]);

        $item->update($request->only(['name', 'description']));
        return redirect()->route('items.index')->with('succes', 'Item updated succesfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $item)
    {
        $item->delete();
        return redirect()->route('items.index')->with('succes', 'Item deleted succesfully.');
    }
}
