<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        $products = $this->productService->getAll($request);

        return view('admin.pages.products.index')->with('products', $products);
    }

    public function create()
    {
        return view('admin.pages.products.create');
    }

    public function store(ProductCreateRequest $request)
    {
        try {
            $this->productService->create($request->all());
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['msg' => $e->getMessage()]);
        }

        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    public function edit(Product $product)
    {
        return view('admin.pages.products.edit')
            ->with('product', $product);
    }

    public function update(ProductUpdateRequest $request, Product $product)
    {
        try {
            $this->productService->update($product->id, $request->all());
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['msg' => $e->getMessage()]);
        }

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    public function delete(Product $product)
    {
        try {
            $this->productService->delete($product->id);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['msg' => $e->getMessage()]);
        }

        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
