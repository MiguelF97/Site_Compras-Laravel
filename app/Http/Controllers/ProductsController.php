<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Session;
use App\Cart;
use Image;

class ProductsController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }
    
    public function getIndex() {
        $products = Product::all();

        return view('shop.index')->withProducts($products);
    }

    public function getAddToCart(Request $request, $id) {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect()->route('shop.index');

    }

    public function getCart() {
        if(!Session::has('cart')) {
            return view('shop.shopping-cart');
        }

        //$oldCart = Session::get('cart');
        $cart = new Cart(Session::get('cart'));
        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Create a variable and store all Products.
        $products = Product::paginate(10);

        //Return a view and pass the variable.
        return view('products.index')->withProducts($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate the Data
        $this->validate($request, array(
            'type' => 'required',
            'author' => 'required',
            'name' => 'required',
            'genre' => 'required',
            'release' => 'required',
            'price' => 'required'
        ));

        //Store in the DB
        $product = new Product;

        $product->type = $request->type;
        $product->author = $request->author;
        $product->name = $request->name;
        $product->genre = $request->genre;
        $product->release = $request->release;
        $product->price = $request->price;
        
        //Save our image
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/products/' . $filename);
            Image::make($image)->resize(220,220)->save($location);

            $product->image = $filename;
        }

        $product->save();

        Session::flash('success', 'The product was added with success!');

        //Redirect to another page
        return redirect()->route('products.show', $product->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('products.show')->withProduct($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Find the product in the DB and save it as a variable
        $product = Product::find($id);
        //Return the view and pass the product
        return view('products.edit')->withProduct($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validate the Data
        $this->validate($request, array(
            'type' => 'required',
            'author' => 'required',
            'name' => 'required',
            'genre' => 'required',
            'release' => 'required',
            'price' => 'required'
        ));

        //Save Data to DB
        $product = Product::find($id);

        $product->type = $request->input('type');
        $product->author = $request->input('author');
        $product->name = $request->input('name');
        $product->genre = $request->input('genre');
        $product->release = $request->input('release');
        $product->price = $request->input('price');

        $product->save();

        //Set Flash message with success message
        Session::flash('success', 'The product was updated with success!');

        //Redirect with a flash message to products.show
        return redirect()->route('products.show', $product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();

        Session::flash('success', 'The product was deleted with success!');
        
        return redirect()->route('products.index');
    }
}
