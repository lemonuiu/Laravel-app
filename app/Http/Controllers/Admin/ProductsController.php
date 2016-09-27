<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;

use App\Products;
use App\Http\Requests\CreateProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;

use App\cart;
use Session;

class ProductsController extends Controller {

	/**
	 * Display a listing of products
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $products = Products::all();

		return view('admin.products.index', compact('products'));
	}

	/**
	 * Show the form for creating a new products
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.products.create');
	}

	/**
	 * Store a newly created products in storage.
	 *
     * @param CreateProductsRequest|Request $request
	 */
	public function store(CreateProductsRequest $request)
	{
	    $request = $this->saveFiles($request);
		Products::create($request->all());

		return redirect()->route('admin.products.index');
	}

	/**
	 * Show the form for editing the specified products.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$products = Products::find($id);
	    
	    
		return view('admin.products.edit', compact('products'));
	}

	/**
	 * Update the specified products in storage.
     * @param UpdateProductsRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateProductsRequest $request)
	{
		$products = Products::findOrFail($id);

        $request = $this->saveFiles($request);

		$products->update($request->all());

		return redirect()->route('admin.products.index');
	}

	/**
	 * Remove the specified products from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Products::destroy($id);

		return redirect()->route('admin.products.index');
	}

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request){
        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            Products::destroy($toDelete);
        } else {
            Products::whereNotNull('id')->delete();
        }

        return redirect()->route('admin.products.index');
    }


    public function AddtoCart(Request $request, $id){
    	$products = Products::findOrFail($id);
    	$OldCart = Session::has('cart') ? Session::get('cart') : null;
    	$cart = new cart($OldCart);
    	$cart->add($products, $products->id);

    	$request->Session()->put('cart', $cart);

    	//dd($request->Session()->get('cart'));
    	
    	//return redirect()->route('common.index');
    	//return view ('cart/add-to-cart');
    	return redirect()->back();
    }

    public function getCart(){
    	if (!Session::has('cart')) {
    		return view ('cart/add-to-cart', ['products'=> null]);
    	}
    	$oldCart = Session::get('cart');
    	$cart = new Cart($oldCart);
    	return view ('cart/add-to-cart', ['products' => $cart->items, 'totalPrice'=>$cart->totalPrice]);
    	
    }

}
