<?php

namespace App\Http\Controllers;

use App\Models\Appliance;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ApplianceController extends Controller
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

        return view('appliances.home', [
            'appliances' => $appliances,
            'filter' => $filter
        ]);
    }

    public function create()
    {
        $brands = Brand::all();

        return view("appliances.create", [
            "brands" => $brands
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

        return Redirect::route('appliances')->with('success', 'Appliance created!');
    }

    public function edit(Appliance $appliance)
    {
        $brands = Brand::all();

        return view("appliances.edit", [
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

        return Redirect::route('appliances')->with('success', 'Appliance saved!');
    }

    public function destroy(Appliance $appliance)
    {
        $appliance->delete();

        return Redirect::route('appliances')->with('warning', 'Appliance deleted!');
    }
}
