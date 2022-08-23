<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CustomerAddressRequest;
use App\Models\Country;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;

class CustomerAddressController extends Controller
{

    public function index()
    {
        $customer_addresses = UserAddress::query()/*with('products')*/
            ->when(\request()->keyword != null, function ($query) {
                $query->search(\request()->keyword);
            })
            ->when(\request()->status != null, function ($query) {
                $query->whereDefaultAddress(\request()->default_address);
            })
            ->orderBy(request()->order_by ?? 'id')
            ->paginate(request()->limit_by ?? 6);

        return view('backend.customer_address.index', compact('customer_addresses'));

    }

    public function create()
    {

        $customers = User::all();
        $countries = Country::whereStatus(true)->get(['id', 'name']);
        return view('backend.customer_address.create', compact('customers','countries'));

    }

    public function store(CustomerAddressRequest $request)
    {

        UserAddress::create($request->validated());

        return redirect()->route('admin.customer_addresses.index')->with([
            'message' => ' Created Successfully',
            'alert-type' => 'success'
        ]);

    }

    public function show($id)
    {
        //
    }

    public function edit(UserAddress $customerAddress)
    {
        $countries = Country::whereStatus(true)->get(['id', 'name']);
        return view('backend.customer_address.edit', compact( 'countries', 'customerAddress'));
    }

    public function update(CustomerAddressRequest $request, UserAddress $customer_address)
    {

        $customer_address->update($request->validated());

        return redirect()->route('admin.customer_addresses.index')->with([
            'message' => ' Updated Successfully',
            'alert-type' => 'success'
        ]);
    }

    public function destroy(UserAddress $customer_address)
    {

        $customer_address->delete();

        return redirect()->route('admin.customer_addresses.index')->with([
            'message' => ' Deleted Successfully',
            'alert-type' => 'danger'
        ]);
    }

}
