<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Category;
use Gloudemans\Shoppingcart\Facades\Cart;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AddToCart($id)
    {
        $catchinfoproduct = Produit::find($id);
        $Tables = [Category::all(),Produit::find($id)];
        Cart::add(['id' => $catchinfoproduct->id, 'name' => $catchinfoproduct->name, 'qty' => 1,'price' => $catchinfoproduct->price]);
        
        return view('single-product')->with("singlesproduct",$Tables);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("cart")->with("categories",Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $erray = $request->request->all();
        foreach( $erray as $key => $value){
            if($key == "_token"){
                continue;
            }else{
                Cart::update($key, $value );
            }
        }
        return redirect("carti");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return redirect("/carti");
    }
}
