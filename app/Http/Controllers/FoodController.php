<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin'); // ✅ Correct way to apply middleware
    }

    public function index(Request $request)
    {
        $query = Food::query();

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        $foods = $query->paginate(10);
        $categories = Category::all();

        return view('foods.index', compact('foods', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('foods.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:foods,name',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'unit' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('foods', 'public');
            $validated['image'] = $imagePath;
        }

        Food::create($validated);

        return redirect()->route('foods.index')->with('success', 'Food created successfully.');
    }

    public function edit(Food $food)
    {
        $categories = Category::all();
        return view('foods.edit', compact('food', 'categories'));
    }

    public function update(Request $request, Food $food)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:foods,name,' . $food->id,
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'unit' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Delete the existing image if it exists
            if ($food->image) {
                Storage::disk('public')->delete($food->image);
            }

            // Store the new image
            $imagePath = $request->file('image')->store('foods', 'public');
            $validated['image'] = $imagePath;
        }

        $food->update($validated);

        return redirect()->route('foods.index')->with('success', 'Food updated successfully.');
    }

    public function destroy(Food $food)
    {
        // Delete the image if it exists
        if ($food->image) {
            Storage::disk('public')->delete($food->image);
        }

        $food->delete();

        return redirect()->route('foods.index')->with('success', 'Food deleted successfully.');
    }
}
