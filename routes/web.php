<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Product;

Route::middleware('auth')->group(function(){

    Route::get('products', function(){

        $products = Product::orderBy('description','asc')->get();
        return view('products.index',compact('products'));

    })->name('products.index');
    
    Route::get('products/create', function(){

        return view('products.create');

    })->name('products.create');
    
    Route::post('products', function(Request $request){

        $newProduct                 = new Product;
        $newProduct->description    = $request->input('description');
        $newProduct->price          = $request->input('price');
        $newProduct->save();

        return redirect()->route('products.index')->with('info','Producto creado exitosamente!');
    
    })->name('products.store');
    
    Route::delete('products/{id}', function($id){

        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('info','Producto eliminado exitosamente!');
    
    })->name('products.destroy');
    
    Route::get('products/edit/{id}', function($id){

        $product = Product::findOrFail($id);
        return view('products.edit',compact('product'));
    
    })->name('products.change');
    
    Route::put('products/edit/{id}', function($id, Request $request){

        $product = new Product;
        $product->where('id',$id)->update(['description' => $request->input('description'),'price' => $request->input('price')]);
        return redirect()->route('products.index')->with('info','Producto editado exitosamente!');
    
    })->name('products.edit');

});

Auth::routes();

