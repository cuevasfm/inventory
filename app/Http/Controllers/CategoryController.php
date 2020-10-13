<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        return view('categories.index', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validData = $request->validate(
            ['category' => 'required | min:3 | max:99 | unique:categories,name_category'],
            [
                'category.required' => 'El campo Categoría es requerido',
                'category.min' => 'El campo Categoría requiere mínimo 3 caracteres',
                'category.unique' => 'Ya existe en la base de datos',
            ]
        );
        $categories = new Category();
        $categories->name_category = $request->get('category');
        $categories->save();
        return redirect('/config/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::find($id);
        return view('categories/edit', [
            'categories' => $categories
        ]);
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
        $validData = $request->validate(
            ['category' => 'required | min:3 | max:99 | unique:categories,name_category'],
            [
                'category.required' => 'El campo Categoría es requerido',
                'category.min' => 'El campo Categoría requiere mínimo 3 caracteres',
                'category.unique' => 'Ya existe en la base de datos',
            ]
        );
        $categories = Category::find($id);
        $categories->name_category = $request->get('category');
        $categories->save();
        return redirect('/config/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
