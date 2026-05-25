<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category')->latest();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $products   = $query->paginate(10)->withQueryString();
        $categories = Category::active()->ordered()->get();

        return view('admin.products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::active()->ordered()->get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'short_description' => 'nullable|string|max:500',
            'description'       => 'required|string',
            'price'             => 'nullable|numeric|min:0',
            'discount_price'    => 'nullable|numeric|min:0',
            'category_id'       => 'nullable|exists:categories,id',
            'demo_link'         => 'nullable|url',
            'file'              => 'nullable|file|mimes:zip,rar|max:102400',
            'documentation'     => 'nullable|file|mimes:pdf|max:20480',
        ]);

        $data = $request->except(['file', 'documentation', 'technologies', 'features', 'images', '_token']);
        $data['slug']        = Str::slug($request->name);
        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active']   = $request->boolean('is_active', true);
        $data['status']      = $request->input('status', 'draft');
        $data['pricing_type']= $request->input('pricing_type', 'fixed');

        $data['price']        = $request->input('price') ?? 0;
        $data['technologies'] = $this->parseTextarea($request->technologies);
        $data['features']     = $this->parseTextarea($request->features);
        $data['images']       = $this->parseTextarea($request->images);

        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('products/files', 'local');
        }
        if ($request->hasFile('documentation')) {
            $data['documentation_path'] = $request->file('documentation')->store('products/docs', 'local');
        }

        Product::create($data);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::active()->ordered()->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'short_description' => 'nullable|string|max:500',
            'description'       => 'required|string',
            'price'             => 'nullable|numeric|min:0',
            'discount_price'    => 'nullable|numeric|min:0',
            'category_id'       => 'nullable|exists:categories,id',
            'demo_link'         => 'nullable|url',
            'file'              => 'nullable|file|mimes:zip,rar|max:102400',
            'documentation'     => 'nullable|file|mimes:pdf|max:20480',
        ]);

        $data = $request->except(['file', 'documentation', 'technologies', 'features', 'images', '_token', '_method']);
        $data['slug']        = Str::slug($request->name);
        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active']   = $request->boolean('is_active', true);
        $data['status']      = $request->input('status', 'draft');
        $data['pricing_type']= $request->input('pricing_type', 'fixed');

        $data['price']        = $request->input('price') ?? 0;
        $data['technologies'] = $this->parseTextarea($request->technologies);
        $data['features']     = $this->parseTextarea($request->features);
        $data['images']       = $this->parseTextarea($request->images);

        if ($request->hasFile('file')) {
            if ($product->file_path) Storage::disk('local')->delete($product->file_path);
            $data['file_path'] = $request->file('file')->store('products/files', 'local');
        }
        if ($request->hasFile('documentation')) {
            if ($product->documentation_path) Storage::disk('local')->delete($product->documentation_path);
            $data['documentation_path'] = $request->file('documentation')->store('products/docs', 'local');
        }

        $product->update($data);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        if ($product->file_path) Storage::disk('local')->delete($product->file_path);
        if ($product->documentation_path) Storage::disk('local')->delete($product->documentation_path);

        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully.');
    }

    private function parseTextarea(?string $value): array
    {
        if (empty($value)) return [];
        return array_values(array_filter(array_map('trim', explode("\n", $value))));
    }
}
