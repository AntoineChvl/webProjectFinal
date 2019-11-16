<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddCategory;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shop.showCategories')->withCategories(Category::all());
    }

    public function show(Request $request,$id)
    {
        $category = Category::find($id);
        if($request->has('price_min','price_max')){
            $products = $category->products()->where('price','>=',$request->price_min)->where('price','<=',$request->price_max)->get();
        }else{
            $products = $category->products;
        }

        return view('shop.shop')->withProducts($products)->withCategory($category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shop.createCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddCategory $request)
    {
        Category::create($request->only('name'));
        Session::flash('message flash', ['type' => 'success', 'content' => "La catégorie a bien été ajoutée"]);
        return redirect(route('admin-panel'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Category::find($id);
        if ($cat) {
            $cat->delete();
        }
    }

    public function allFormatted()
    {
        $categories = Category::all();
        $categoriesDetails = [];

        for($i = 0; $i < $categories->count(); $i++)
        {
            $categoriesDetails[$i] = array('category_name' => $categories[$i]->name,'category_id' => $categories[$i]->id);

        }

        return Response::json(array('data' => $categoriesDetails));
    }


}
