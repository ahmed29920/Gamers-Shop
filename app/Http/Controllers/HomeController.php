<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use App\Models\Offer;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function Ramsey\Uuid\v1;

class HomeController extends Controller
{

    /**
     * Show the application home.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {

        return view('welcome', ['categories' => Categorie::paginate(3), 'offers' => Offer::all()]);
    }

    /**
     * Show the application home.
     *
     * @return \Illuminate\View\View
     */
    public function shop()
    {

        return view('shop', ['categories' => Categorie::all()]);
    }

    /**
     * Show the application home.
     *
     * @return \Illuminate\View\View
     */
    public function about()
    {

        return view('about');
    }

    /**
     * Show the application home.
     *
     * @return \Illuminate\View\View
     */
    public function clients()
    {

        return view('clients');
    }
    /**
     * Show the application home.
     *
     * @return \Illuminate\View\View
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function CategoryIndex($id)
    {
        // dd(Cart::where('user_id', Auth::user()->id)->get());
        return view('Category', [
            'products' => Product::where('category_id', $id)->get() ,
            'category' => Categorie::where('id' , $id)->get() 
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function ProductIndex($id)
    {

        return view('Product', ['products' => Product::where('id', $id)->get()]);
    }

    //search category
    function search(Request $request){
        $category = Categorie::where('name', 'like' , '%' . $request->input('search').'%')->get();
        if (count($category) > 0) {
            $products = Product::where('category_id', $category[0]->id)->get() ;
            return view('Category' , ['category' => $category ,'products' => $products ]);
        }
        else{
            Session()->flash('error', 'Category not exist');
            return view('shop', ['categories' => Categorie::all()]);
        }

    }

    // profile

    public function editProfile()
    {
        return view('layouts.profile.edit');
    }

    public function orders()
    {
        return view('layouts.profile.orders');
    }
}
