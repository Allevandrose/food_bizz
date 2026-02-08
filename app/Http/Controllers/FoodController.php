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
        $this->middleware('admin');
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
        $categories = Category::all();
        return view('admin.foods.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:foods,name',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'unit' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // CHANGE: Store in folder named after User ID on 'supabase' disk
            // This satisfies your RLS Policy: (storage.foldername(name))[1] = auth.uid()
            $folder = auth()->id();
            $validated['image'] = $request->file('image')->store($folder, 'supabase');
        }

        Food::create($validated);

        return redirect()->route('admin.foods.index')->with('success', 'Food created successfully.');
    }

    public function edit(Food $food)
    {
        $categories = Category::all();
        return view('admin.foods.edit', compact('food', 'categories'));
    }

    public function update(Request $request, Food $food)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:foods,name,' . $food->id,
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'unit' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // CHANGE: Delete old image from 'supabase'
            if ($food->image) {
                Storage::disk('supabase')->delete($food->image);
            }

            // CHANGE: Store new image in User ID folder on 'supabase'
            $folder = auth()->id();
            $validated['image'] = $request->file('image')->store($folder, 'supabase');
        }

        $food->update($validated);

        return redirect()->route('admin.foods.index')->with('success', 'Food updated successfully.');
    }

    public function destroy(Food $food)
    {
        // CHANGE: Delete from 'supabase' disk
        if ($food->image) {
            Storage::disk('supabase')->delete($food->image);
        }

        $food->delete();
        return redirect()->route('admin.foods.index')->with('success', 'Food deleted successfully.');
    }
}
