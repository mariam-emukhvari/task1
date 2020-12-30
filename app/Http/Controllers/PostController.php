<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Product::all();
        return view('welcome', compact('posts'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'product_name' => 'required',
            'description' => 'required',
        ]);

        Product::create([
           'product_name' => $request->product_name,
           'description' => $request->description,
        ]);

        return redirect('/');
    }
}
