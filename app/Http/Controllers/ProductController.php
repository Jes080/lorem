<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::paginate(10);
        $title = "Product Management";

        if ($request->route()->getName() === 'charts.index') {
            // Return view for 'charts.index'
            return view('charts.index', compact('products'));
        } else {
            // Return view for 'pages.product'
            return view('pages.product', compact('products','title'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product)
    {
        // for create form
        //return view('taskfunc.create');

    }

    /**
     * Store a newly created resource in storage.

     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:191',
            'quantity' => 'required|integer',
            'category' => 'required|string|max:191',
            'remarks' => 'nullable|string',
            'date' => 'required|date',

        ]);

        // Create a new task using the validated data
        Product::create($validatedData);

        return redirect('/product')->with('success', 'Product added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('form.updateproductform', ['product' => $product]);}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('form.updateproductform', compact('product'));    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:191',
            'quantity' => 'required|integer',
            'category' => 'required|string|max:191',
            'remarks' => 'nullable|string',
            'date' => 'required|date',
        ]);

        // Update the task with the validated data
        $product->update($validatedData);

        return redirect('/product')->with('success', 'Product updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/product')->with('success', 'Product deleted successfully!');
    }
}
