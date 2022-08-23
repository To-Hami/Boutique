<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\backend\CountryRequest;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{

    public function index()
    {
        $countries = Country::with('states')
            ->when(\request()->keyword != null, function ($query) {
                $query->search(\request()->keyword);
            })
            ->when(\request()->status != null, function ($query) {
                $query->whereStatus(\request()->status);
            })
            ->orderBy(request()->order_by ?? 'id')
            ->paginate(request()->limit_by ?? 6);

        return view('backend.countries.index', compact('countries'));

    }

    public function create()
    {

        return view('backend.countries.create');

    }

    public function store(CountryRequest $request)
    {
        Country::create($request->validated());

        return redirect()->route('admin.countries.index')->with([
            'message' => 'Country Created Successfully',
            'alert-type' => 'success'
        ]);

    }

    public function show(Country $country)
    {
        //
    }

    public function edit(Country $country)
    {
        return view('backend.countries.edit', compact('country'));
    }

    public function update(CountryRequest $request, Country $country)
    {
        $country->update($request->validated());

        return redirect()->route('admin.countries.index')->with([
            'message' => 'Country Updated Successfully',
            'alert-type' => 'success'
        ]);
    }

    public function destroy(Country $country)
    {

        $country->delete();

        return redirect()->route('admin.countries.index')->with([
            'message' => 'Country Deleted Successfully',
            'alert-type' => 'danger'
        ]);
    }


}
