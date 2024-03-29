<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    /**
     * Display a listing of the items.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $items = Item::query();

        if ($search) {
            $items->where('itemDescription', 'like', '%' . $search . '%');
        }

        $items = $items->paginate(10);

        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new item.
     */
    public function create()
    {
        return view('items.createFormItem');
    }

    /**
     * Store a newly created item in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'itemName' => [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) {
                    if (Item::where('itemName', $value)->exists()) {
                        $fail('El nombre del Item ya existe, intenta con otro nombre.');
                    }
                },
            ],
            'itemDescription' => 'required|string',
            'itemPrice' => 'required|numeric',
        ]);

        $item = Item::create($validatedData);

        return redirect()->route('items.index')->with('Success', 'Se ha creado exitosamente el Item');
    }

    /**
     * Display the item to delete.
     */
    public function show(Item $item)
    {
        return view('items.deleteAlertItem', compact('item'));
    }

    /**
     * Show the form for editing the specified item.
     */
    public function edit(Item $item)
    {
        return view('items.editFormItem', compact('item'));
    }

    /**
     * Update the specified item in storage.
     */
    public function update(Request $request, Item $item)
    {
        $validatedData = $request->validate([
            'itemName' => [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) use ($item) {
                    if (
                        Item::where('itemName', $value)
                            ->where('id', '!=', $item->id)
                            ->exists()
                    ) {
                        $fail('El nombre del Item ya existe, intenta con otro nombre.');
                    }
                },
            ],
            'itemDescription' => 'required|string',
            'itemPrice' => 'required|numeric',
        ]);

        $item->update($validatedData);
        return redirect()->route('items.index')->with('update', 'El ítem ha sido actualizado exitosamente!');
    }

    /**
     * Remove the specified item from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('items.index')->with('delete', 'Se ha eliminado exitosamente el item');
    }
}
