<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; //mengambil model item dari namespace
use App\Models\Item;


class ItemController extends Controller
{
    //mengambil semua data atau item
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

   //menampilkan form untuk menambahkan data baru
    public function create()
    {
        return view('items.create');
    }

    //menyimpan data ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        Item::create($request->only(['name', 'description']));
        return redirect()->route('items.index')->with('success', 'Item added succesfully.');
    }

   //menampilkan pesan
    public function show(Item $item)
    {
        return view('items.show',compact('item'));
    }

    //menampilkan form edit data
    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    //memperbarui pada database
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name'=> 'required',
            'description' => 'required',
        ]);

        $item->update($request->only(['name', 'description']));
        return redirect()->route('items.index')->with('success', 'Item updated succesfully.');
    }

    //menghapus data dari database
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }
}
