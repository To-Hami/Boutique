<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\backend\CouponRequest;
use App\Models\Coupon;
use App\Models\productCoupon;

class couponController extends Controller
{

    public function index()
    {
        $coupons = Coupon::query()
            ->when(\request()->keyword != null, function ($query) {
                $query->search(\request()->keyword);
            })
            ->when(\request()->status != null, function ($query) {
                $query->whereStatus(\request()->status);
            })
            ->orderBy(request()->order_by ?? 'id')
            ->paginate(request()->limit_by ?? 6);

        return view('backend.coupons.index', compact('coupons'));

    }

    public function create()
    {

        return view('backend.coupons.create');

    }


    public function store(CouponRequest $request)
    {


        Coupon::create($request->validated());

        return redirect()->route('admin.coupons.index')->with([
            'message' => 'Coupon Created Successfully',
            'alert-type' => 'success'
        ]);

    }

    public function show($id)
    {
        //
    }

    public function edit(Coupon $coupon)
    {


        return view('backend.coupons.edit', compact('coupon'));
    }


    public function update(CouponRequest $request, Coupon $coupon)
    {

        $coupon->update($request->validated());

        return redirect()->route('admin.coupons.index')->with([
            'message' => 'Coupon Updated Successfully',
            'alert-type' => 'success'
        ]);
    }


    public function destroy(Coupon $coupon)
    {

        $coupon->delete();

        return redirect()->route('admin.coupons.index')->with([
            'message' => 'Coupon Deleted Successfully',
            'alert-type' => 'danger'
        ]);
    }


}
