<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('brands.index', [
            'brands' => Brand::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brands.new');
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
            ['name_brand' => 'required | min:3 | max:99 | unique:brands,name_brand'],
            [
                'name_brand.required' => 'El campo Categoría es requerido',
                'name_brand.min' => 'El campo Categoría requiere mínimo 3 caracteres',
                'name_brand.unique' => 'Ya existe en la base de datos'
            ]
        );
        $brands = new Brand();
        $brands->name_brand = $request->get('name_brand');
        $brands->save();
        return redirect('/config/brands');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $brands = Brand::find($id);
        return view('brands/edit', [
            'brands' => $brands
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
            ['name_brand' => 'required | min:3 | max:99 | unique:brands,name_brand'],
            [
                'name_brand.required' => 'El campo Marca es requerido',
                'name_brand.min' => 'El campo Marca requiere mínimo 3 caracteres',
                'name_brand.unique' => 'Ya existe en la base de datos el registro'
            ]
        );
        $brands = Brand::find($id);
        $brands->name_brand = $request->get('name_brand');
        $brands->save();
        return redirect('/config/brands');
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
