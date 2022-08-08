<?php

namespace App\Http\Controllers;

use App\Models\Appliance;
use App\Models\Brand;
use Illuminate\Http\Request;

class ApplianceApiController extends Controller
{
    public int $items = 4;

    public function index(Request $request)
    {
        $filter = $request->query('filter');

        if(!empty($filter)){
            $appliances = Appliance::where('appliances.name', 'like', '%'.$filter.'%')->with('brand')->paginate($this->items);
        }else{
            $appliances = Appliance::with('brand')->paginate($this->items);
        }

        return response()->json([
            'appliances' => $appliances,
            'filter' => $filter
        ]);
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            "name" => "required|string",
            "voltage" => "required|integer",
            "brand_id" => "required",
            "description" => "nullable"
        ]);

        Appliance::create($input);

        return response()->json([
            "message" => "Appliance created!"
        ]);
    }

    public function edit(Appliance $appliance)
    {
        $brands = Brand::all();

        return response()->json([
            "appliance" => $appliance,
            "brands" => $brands
        ]);

    }

    public function update(Appliance $appliance, Request $request)
    {
        $input = $request->validate([
            "name" => "required|string",
            "voltage" => "required|integer",
            "brand_id" => "required",
            "description" => "nullable"
        ]);

        $appliance->fill($input);
        $appliance->update();

        return response()->json([
            "message" => "Appliance updated!"
        ]);
    }

    public function destroy(Appliance $appliance)
    {
        $appliance->delete();

        return response()->json([
            "message" => "Appliance deleted!"
        ]);
    }
}
