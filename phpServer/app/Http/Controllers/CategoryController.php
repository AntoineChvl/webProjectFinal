<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddCategory;
use Cassandra\Session;
use Illuminate\Http\Request;

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
            Session::flash('message flash', ['type' => 'success', 'content' => "La catégorie a bien été supprimée"]);
        }else{
            Session::flash('message flash', ['type' => 'danger', 'content' => "La catégorie n'existe pas"]);
        }
    }
}
