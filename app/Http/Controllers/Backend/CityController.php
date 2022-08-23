<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\backend\CityRequest;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::query()
            ->when(\request()->keyword != null, function ($query) {
                $query->search(\request()->keyword);
            })
            ->when(\request()->status != null, function ($query) {
                $query->whereStatus(\request()->status);
            })
            ->orderBy(request()->order_by ?? 'id')
            ->paginate(request()->limit_by ?? 6);

        return view('backend.cities.index', compact('cities'));

    }

    public function create()
    {

        $states = State::all();
        return view('backend.cities.create', compact('states'));

    }

    public function store(CityRequest $request)
    {

        City::create($request->validated());

        return redirect()->route('admin.cities.index')->with([
            'message' => 'City Created Successfully',
            'alert-type' => 'success'
        ]);

    }

    public function show(City $state)
    {

    }

    public function edit(City $city)
    {
        return view('backend.cities.edit', compact('city'));
    }

    public function update(CityRequest $request, City $city)
    {

        $city->update($request->validated());

        return redirect()->route('admin.cities.index')->with([
            'message' => 'City Updated Successfully',
            'alert-type' => 'success'
        ]);
    }

    public function destroy(City $city)
    {
        $city->delete();

        return redirect()->route('admin.cities.index')->with([
            'message' => 'City Deleted Successfully',
            'alert-type' => 'danger'
        ]);
    }

    public  function get_cities(Request $request){
        $cities = City::whereStateId($request->state_id)->get(['id','name'])->toArray();
        return  response()->json($cities);
    }
}
