<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Part;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ViewErrorBag;

class Inventory extends Controller
{
    public function index()
    {
        return view('inventory.index', [
            //'parts' => Part::all()
            'parts' => Part::select('parts')
                ->join('brands', 'brands.id', '=', 'parts.brand_id')
                ->join('categories', 'categories.id', '=', 'parts.category_id')
                ->select('parts.*', 'brands.name_brand', 'categories.name_category')
                ->get()
        ]);
        return (Part::all());
    }
    public function new()
    {
        return view('inventory/new', [
            'categories' => Category::all(),
            'brands' => Brand::all()
        ]);
    }
    public function store(Request $request)
    {
        $parts = new  Part();
        $parts->name_part = $request->get('name_part');
        $parts->category_id = $request->get('category_id');
        $parts->brand_id = $request->get('brand_id');
        $parts->model = $request->get('model');
        $parts->sn = $request->get('sn');
        $parts->processor = $request->get('processor');
        $parts->memory = $request->get('memory');
        $parts->storage = $request->get('storage');
        $parts->wifi = $request->get('wifi');
        $parts->resolution = $request->get('resolution');
        $parts->screen_size = $request->get('screen_size');
        $parts->date_purchase = $request->get('date_purchase');
        $parts->data_add = $request->get('data_add');
        $parts->user_id =  Auth::id();
        $parts->save();
        return redirect('/inventory');
    }
    public function edit($id)
    {
        return view('inventory.edit', [
            'parts' => Part::find($id),
            'categories' => Category::all(),
            'brands' => Brand::all()
        ]);
    }
}
