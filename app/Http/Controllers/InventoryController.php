<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Inventory;
use App\Models\Category;
use App\Models\Brand;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inventories/index', [
            'inventories' => Inventory::select('inventories')
                ->leftjoin('employees', 'inventories.employee_id', '=', 'employees.id')
                ->join('brands', 'brands.id', '=', 'inventories.brand_id')
                ->join('categories', 'categories.id', '=', 'inventories.category_id')
                ->select('inventories.*', 'brands.name_brand', 'categories.name_category', 'employees.name_employee', 'employees.id as employee_id')
                ->orderBy('inventories.id', 'desc')
                ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventories/create', [
            'categories' => Category::all(),
            'brands' => Brand::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $inventories = new  Inventory();
            $inventories->inventory_name = mb_strtoupper($request->get('inventory_name'));
            $inventories->category_id = $request->get('category_id');
            $inventories->brand_id = $request->get('brand_id');
            $inventories->model = mb_strtoupper($request->get('model'));
            $inventories->sn = mb_strtoupper($request->get('sn'));
            $inventories->processor = mb_strtoupper($request->get('processor'));
            $inventories->memory = mb_strtoupper($request->get('memory'));
            $inventories->storage = mb_strtoupper($request->get('storage'));
            $inventories->wifi = $request->get('wifi');
            $inventories->resolution = mb_strtoupper($request->get('resolution'));
            $inventories->screen_size = mb_strtoupper($request->get('screen_size'));
            $inventories->date_purchase = $request->get('date_purchase');
            $inventories->data_add = mb_strtoupper($request->get('data_add'));
            $inventories->user_id =  Auth::id();
            $inventories->save();
            return redirect('/inventories');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('inventories.show', [
            'inventories' => Inventory::select('inventories')
                ->leftjoin('employees', 'inventories.employee_id', '=', 'employees.id')
                ->join('brands', 'brands.id', '=', 'inventories.brand_id')
                ->join('categories', 'categories.id', '=', 'inventories.category_id')
                ->where('inventories.id', $id)
                ->select('inventories.*', 'brands.name_brand', 'categories.name_category', 'employees.name_employee', 'employees.id as employee_id')
                ->get(),
            'id' => $id,
            'activity_logs' => ActivityLog::select('id', 'type', 'description', 'date')
                ->where('inventories_id', $id)
                ->orderBy('id', 'desc')
                ->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('inventories/edit', [
            'inventories' => Inventory::find($id),
            'categories' => Category::all(),
            'brands' => Brand::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inventories = Inventory::find($id);
        $inventories->inventory_name = mb_strtoupper($request->get('inventory_name'));
        $inventories->category_id = $request->get('category_id');
        $inventories->brand_id = $request->get('brand_id');
        $inventories->model = mb_strtoupper($request->get('model'));
        $inventories->sn = mb_strtoupper($request->get('sn'));
        $inventories->processor = mb_strtoupper($request->get('processor'));
        $inventories->memory = mb_strtoupper($request->get('memory'));
        $inventories->storage = mb_strtoupper($request->get('storage'));
        $inventories->wifi = $request->get('wifi');
        $inventories->resolution = mb_strtoupper($request->get('resolution'));
        $inventories->screen_size = mb_strtoupper($request->get('screen_size'));
        $inventories->date_purchase = $request->get('date_purchase');
        $inventories->data_add = mb_strtoupper($request->get('data_add'));
        $inventories->user_id =  Auth::id();
        $inventories->save();
        return redirect('/inventories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        //
    }

    public function deploy($id)
    {
        $inventories = Inventory::find($id);
        return $inventories->toJson(JSON_PRETTY_PRINT);
    }

    public function uploadphoto(Request $request, $id)
    {
        $image = $request->file('file');
        $filename = $image->getClientOriginalName();
        $filename2 = Str::random(60) . '.jpg';
        $image_rezise = Image::make($image->getRealPath());
        $image_rezise->resize(800, null,  function ($constraint) {
            $constraint->aspectRatio();
        });
        $image_rezise->save(public_path('images/' . $filename2, 80, 'jpg'));

        $inventories = Inventory::find($id);
        $inventories->img = $filename2;
        $inventories->save();

        return redirect('/inventories/' . $id);
        return 'Image save successfully: ' . $id . $filename2;
    }

    public function deletephoto($id, $img)
    {
        $inventories = Inventory::find($id);
        $inventories->img = null;
        $inventories->save();
        echo public_path('images/') . $img;
        unlink(public_path('images/') . $img);
        return redirect('/inventories/' . $id);
        return 'Image delete successfully: ' . $id;
    }

    public function inventories_json()
    {
        $json_data = Inventory::select('inventories')
            ->leftjoin('employees', 'inventories.employee_id', '=', 'employees.id')
            ->join('brands', 'brands.id', '=', 'inventories.brand_id')
            ->join('categories', 'categories.id', '=', 'inventories.category_id')
            ->select('inventories.*', 'brands.name_brand', 'categories.name_category', 'employees.name_employee', 'employees.id as employee_id')
            ->orderBy('inventories.id', 'desc')
            ->get();
        return response()->json($json_data);
    }

    public function activitylog_all()
    {
        return view('inventories/activitylog/index', [
            'activitylogs' => ActivityLog::all()->sortByDesc('id')
        ]);
    }

    public function activitylog_create($id)
    {
        return view('inventories/activitylog/create', [
            'inventories_id' => $id
        ]);
    }

    public function activitylog_store(Request $request, $id)
    {
        try {
            $activitylog = new ActivityLog();
            $activitylog->inventories_id = $id;
            $activitylog->type = $request->get('type');
            $activitylog->date = $request->get('date');
            $activitylog->description = mb_strtoupper($request->get('description'));
            $activitylog->user_id =  Auth::id();
            $activitylog->save();
            return redirect('/inventories/' . $id);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
