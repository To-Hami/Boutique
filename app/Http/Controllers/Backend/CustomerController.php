<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\backend\customerRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::query()
            ->when(\request()->keyword != null, function ($query) {
                $query->search(\request()->keyword);
            })
            ->when(\request()->status != null, function ($query) {
                $query->whereStatus(\request()->status);
            })
            ->orderBy(request()->order_by ?? 'id')
            ->paginate(request()->limit_by ?? 6);

        return view('backend.customers.index', compact('customers'));

    }


    public function show($id)
    {
        //
    }

    public function create()
    {

        return view('backend.customers.create');

    }


    public function store(customerRequest $request)
    {

        $input['first_name'] = $request->first_name;
        $input['last_name'] = $request->last_name;
        $input['username'] = $request->username;
        $input['mobile'] = $request->mobile;
        $input['email'] = $request->email;
        $input['status'] = $request->status;
        $input['password'] = bcrypt($request->password);


        if ($request->user_image) {

            $file_name = Str::slug($request->first_name) . '.' . $request->user_image->getClientOriginalExtension();

            $path = public_path('/assets/users/' . $file_name);


            Image::make($request->user_image->getRealPath())->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);

            $input['user_image'] = $file_name;


        }

        $customer = User::create($input);


        return redirect()->route('admin.customers.index')->with([
            'message' => 'Customer Created Successfully',
            'alert-type' => 'success'
        ]);

    }

    public function edit(User $customer)
    {
        return view('backend.customers.edit', compact('customer'));
    }


    public function update(customerRequest $request, User $customer)
    {
        $input['first_name'] = $request->first_name;
        $input['last_name'] = $request->last_name;
        $input['username'] = $request->username;
        $input['mobile'] = $request->mobile;
        $input['email'] = $request->email;
        $input['status'] = $request->status;

        if ($request->password != '') {
            $input['password'] = bcrypt($request->password);
        }

        if ($request->user_image != null && File::exists('assets/users/' . $customer->user_image)) {

            unlink('assets/users/' . $customer->user_image);

            $file_name = Str::slug($request->first_name) . '.' . $request->user_image->getClientOriginalExtension();

            $path = public_path('/assets/users/' . $file_name);

            Image::make($request->user_image->getRealPath())->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);

            $input['user_image'] = $file_name;


        };

        $customer->update($input);

        return redirect()->route('admin.customers.index')->with(['message' => 'Customer Updated Successfully',
            'alert-type' => 'success']);
    }


    public function destroy(User $customer)
    {

        $customer->delete();

        return redirect()->route('admin.customers.index')->with([
            'message' => 'Customer Deleted Successfully',
            'alert-type' => 'danger'
        ]);
    }


    public function delete_image(Request $request)
    {
        $customer = User::findOrFail($request->customer_id);

        if (File::exists('assets/users/' . $customer->user_image)) {
            unlink('assets/users/' . $customer->user_image);
        }

        $customer->user_image = null;
        $customer->save();
        return true;
    }

    public function get_customers()
    {
        $customers = User::whenSearch(request()->search)->get(['username','id']);
        return response()->json($customers);
    }
}
