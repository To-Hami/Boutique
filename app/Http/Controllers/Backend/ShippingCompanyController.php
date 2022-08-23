<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ShippingCompanyRequest;
use App\Models\Country;
use App\Models\shippingCompany;
use Illuminate\Http\Request;

class ShippingCompanyController extends Controller
{
    public function index()
    {
        $shippingCompanies = shippingCompany::withCount('countries')
            ->when(\request()->keyword != null, function ($query) {
                $query->search(\request()->keyword);
            })
            ->when(\request()->status != null, function ($query) {
                $query->whereStatus(\request()->status);
            })
            ->orderBy(request()->order_by ?? 'id')
            ->paginate(request()->limit_by ?? 6);

        return view('backend.shipping_companies.index', compact('shippingCompanies'));

    }

    public function create()
    {

        $countries = Country::orderBy('id','asc')->get();
        return view('backend.shipping_companies.create', compact('countries'));

    }

    public function store(ShippingCompanyRequest $request )
    {

      $shippingCompany =   shippingCompany::create($request->except('countries','submit'));
        $shippingCompany->countries()->sync(array_values($request->countries));

        return redirect()->route('admin.shipping_companies.index')->with([
            'message' => 'City Created Successfully',
            'alert-type' => 'success'
        ]);

    }

    public function show(City $state)
    {

    }

    public function edit(shippingCompany $shippingCompany)
    {
        $countries = Country::all();
        $shippingCompany->with('countries');

        return view('backend.shipping_companies.edit', compact('shippingCompany','countries'));
    }

    public function update(ShippingCompanyRequest $request, shippingCompany $shippingCompany)
    {

        $shippingCompany->update($request->except('countries','submit'));
        $shippingCompany->countries()->sync($request->countries);


        return redirect()->route('admin.shipping_companies.index')->with([
            'message' => ' Updated Successfully',
            'alert-type' => 'success'
        ]);
    }

    public function destroy(shippingCompany $shippingCompany)
    {
        $shippingCompany->delete();

        return redirect()->route('admin.shipping_companies.index')->with([
            'message' => ' Deleted Successfully',
            'alert-type' => 'danger'
        ]);
    }

}
