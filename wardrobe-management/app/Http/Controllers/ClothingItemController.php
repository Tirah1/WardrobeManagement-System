<?php

namespace App\Http\Controllers;

use App\Models\ClothingItem;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ClothingItemController extends Controller
{
    // Display a listing of the clothing items
    public function index()
    {
        $clothingItems = ClothingItem::all(); // Fetch all clothing items
        return Inertia::render('ClothingItems/Index', [
            'clothingItems' => $clothingItems,
        ]);
    }

    // Show the form for creating a new clothing item
    public function create()
    {
        return Inertia::render('ClothingItems/Create'); // Render the create view
    }

    // Store a newly created clothing item in storage
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Create a new clothing item
        ClothingItem::create($request->all());

        // Redirect to the clothing items index with a success message
        return redirect()->route('clothing-items.index')->with('success', 'Clothing item created successfully.');
    }

    // Display the specified clothing item
    public function show($id)
    {
        $clothingItem = ClothingItem::findOrFail($id); // Fetch the clothing item by ID
        return Inertia::render('ClothingItems/Show', [
            'clothingItem' => $clothingItem,
        ]);
    }

    // Show the form for editing the specified clothing item
    public function edit($id)
    {
        $clothingItem = ClothingItem::findOrFail($id); // Fetch the clothing item by ID
        return Inertia::render('ClothingItems/Edit', [
            'clothingItem' => $clothingItem,
        ]);
    }

    // Update the specified clothing item in storage
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Find the clothing item and update it
        $clothingItem = ClothingItem::findOrFail($id);
        $clothingItem->update($request->all());

        // Redirect to the clothing items index with a success message
        return redirect()->route('clothing-items.index')->with('success', 'Clothing item updated successfully.');
    }

    // Remove the specified clothing item from storage
    public function destroy($id)
    {
        $clothingItem = ClothingItem::findOrFail($id); // Fetch the clothing item by ID
        $clothingItem->delete(); // Delete the clothing item

        // Redirect to the clothing items index with a success message
        return redirect()->route('clothing-items.index')->with('success', 'Clothing item deleted successfully.');
    }
}