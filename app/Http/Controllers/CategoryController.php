<?php

namespace App\Http\Controllers;

use App\article;
use App\category;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\DeclareDeclare;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpannel.category.createCategory');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category' => 'required'
        ]);

        $category_name = $request->input('category');
        $category = new category();
        $category->name = $category_name;
        $category->user_id = 1;
        $category->save();
        return redirect()->route('category.list');

    }

    public function getCategoriesList()
    {
        $categories = category::all();
        return view('adminpannel.category.categoriesList', compact('categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $categories = category::where('id', $id)->first();
        return view('adminpannel.category.editCategory', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category' => 'required',
        ]);

        $categories = category::find($id);
        $name = $request->input('category');
        $categories->name = $name;
        $categories->save();
        return redirect()->route('category.list');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_category = category::find($id);
        if ($delete_category != null) {
            $delete_category->delete();
            return redirect()->back();
        }
    }
}
