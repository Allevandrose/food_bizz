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
        $this->middleware('admin'); // ✅ Ensure only admins can access
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
        return view('admin.foods.index', compact('foods'));
    }

    public function create()
    {
        return view('admin.foods.create'); // ✅ Matches "resources/views/admin/foods/create.blade.php"
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:foods,name',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'unit' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // ✅ Find or create category
        $category = Category::firstOrCreate(['name' => $validated['category']]);

        // ✅ Assign category ID and remove category name from input
        $validated['category_id'] = $category->id;
        unset($validated['category']);

        // ✅ Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('foods', 'public');
            $validated['image'] = $imagePath;
        }

        Food::create($validated);

        return redirect()->route('admin.foods.index')->with('success', 'Food created successfully.');
    }

    public function edit(Food $food)
    {
        return view('admin.foods.edit', compact('food'));
    }

    public function update(Request $request, Food $food)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:foods,name,' . $food->id,
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'unit' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // ✅ Find or create category
        $category = Category::firstOrCreate(['name' => $validated['category']]);
        $validated['category_id'] = $category->id;
        unset($validated['category']);

        // ✅ Handle image update
        if ($request->hasFile('image')) {
            if ($food->image) {
                Storage::disk('public')->delete($food->image);
            }
            $imagePath = $request->file('image')->store('foods', 'public');
            $validated['image'] = $imagePath;
        }

        $food->update($validated);

        return redirect()->route('admin.foods.index')->with('success', 'Food updated successfully.');
    }

    public function destroy(Food $food)
    {
        if ($food->image) {
            Storage::disk('public')->delete($food->image);
        }

        $food->delete();
        return redirect()->route('admin.foods.index')->with('success', 'Food deleted successfully.');
    }
}
