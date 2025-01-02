<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\User; 
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    // Products Section
    public function getAllProducts()
    {
        $products = Product::where('status', 1)->get();
        
        $ratings = DB::select('SELECT product_id, AVG(star) as star FROM ratings GROUP BY product_id;');
        
        return view('admin.products', ['products' => $products,
        'ratings' => $ratings]);
    }
    public function getAllDeletedProducts()
    {
        $products = Product::where('status', 0)->get();
        
        return view('admin.deletedProducts', ['products' => $products]);
    }
    public function addAgain($productId)
    {
        $product = Product::findOrFail($productId);

        // Update the status to 0
        $product->status = 1;
        $product->save();

        return redirect()->back()->with('success', 'Product deleted successfully');
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category' => 'nullable|string|max:255',
        ]);

        $product = Product::findOrFail($id);
        $product->update($validated);

        return redirect()->back()->with('success', 'Product updated successfully!');
    }

    public function destroy($productId)
    {
        $product = Product::findOrFail($productId);

        // Update the status to 0
        $product->status = 0;
        $product->save();

        return redirect()->back()->with('success', 'Product deleted successfully');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|string|max:255',
        ]);
        
        Product::create($request->all());

        
        return redirect()->back()->with('success', 'Product added successfully!');
    }
    
    public function getUsers()
    {
        $users = User::all();
        return view('admin.users', ['users'=>$users]);
    }
    public function getRiders()
    {
        $users = User::all();
        return view('admin.riders', ['users'=>$users]);
    }
    public function updateUser(Request $request, User $user)
{
    // dd($request->all());  
    
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,
    ]);

    
    $user->update([
        'name' => $request->name,
        'email' => $request->email,
    ]);

    
    return redirect()->route('admin.users')->with('success', 'User updated successfully');
}


}
