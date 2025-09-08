<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    // List all brands
    public function index()
    {
        $brands = Brand::all();
   
        return view('admin.brand.index', compact('brands'));
    }

    // Show create brand form
    public function create()
    {
        return view('admin.brand.create');
    }

    // Store new brand
   public function store(Request $request)
{
    $request->validate([
        'name'  => 'required|string|max:255',
        'link'  => 'nullable|url',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    ]);

    $brand = new Brand();
    $brand->name = $request->name;
    $brand->link = $request->link;

    // Handle image upload
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/brands'), $filename);
        $brand->image = 'uploads/brands/' . $filename;
    }

    $brand->save();

    return redirect()->route('admin.brands.index')->with('success', 'Brand added successfully.');
}

    // Show edit form
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit', compact('brand'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name'  => 'required|string|max:255',
        'link'  => 'nullable|url',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    ]);

    $brand = Brand::findOrFail($id);
    $brand->name = $request->name;
    $brand->link = $request->link;

    // Handle image upload and remove old image if exists
    if ($request->hasFile('image')) {
        if ($brand->image && file_exists(public_path($brand->image))) {
            unlink(public_path($brand->image));
        }

        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/brands'), $filename);
        $brand->image = 'uploads/brands/' . $filename;
    }

    $brand->save();

    return redirect()->route('admin.brands.index')->with('success', 'Brand updated successfully.');
}

// Delete brand
public function destroy($id)
{
    $brand = Brand::findOrFail($id);

    // Delete image file if exists
    if ($brand->image && file_exists(public_path($brand->image))) {
        unlink(public_path($brand->image));
    }

    $brand->delete();

    return redirect()->route('admin.brands.index')->with('success', 'Brand deleted successfully.');
}
}
