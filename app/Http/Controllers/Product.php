<?php

namespace App\Http\Controllers;

use App\Models\Product as ModelsProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Product extends Controller
{
    public function index()
    {
        $products = ModelsProduct::paginate(6);
        return view('product.index', compact('products'));
    }
    public function create()
    {
        return view('product.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        $image = $request->file('image');
        $image->storeAs('public', $image->hashName());

        ModelsProduct::create([
            'name' => $request->name,
            'price' => str_replace('.', '', $request->price),
            'description' => $request->description,
            'image' => $image->hashName(),
        ]);
        return redirect()->route('product')->with('success', 'Data Berhasil Ditambah');
    }
    public function edit(ModelsProduct $product)
    {
        return view('product.edit', compact('product'));
    }
    public function update(Request $request, ModelsProduct $product)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|numeric',
        ]);
        $product->name = $request->name;
        $product->price = str_replace('.', '', $request->price);
        $product->description = $request->description;

        if ($request->file('image')) {
            if ($product->image !== "noimage.png") {
                Storage::disk('local')->delete('public/'. $product->image);
            }
            $image = $request->file('image');
            $image->storeAs('public', $image->hashName());
            $product->image = $image->hashName();
        }
        $product->update();

        return redirect()->route('product')->with('success', 'Data Berhasil Diupdate');
    }
    public function destroy(ModelsProduct $product)
    {
        if ($product->image !== "noimage.png") {
            Storage::disk('local')->delete('public/'. $product->image);
        }

        $product->delete();

        return redirect()->route('product')->with('success', 'Data Berhasil Dihapus');
    }
}
