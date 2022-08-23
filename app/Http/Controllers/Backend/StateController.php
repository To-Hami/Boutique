<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\backend\StateRequest;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;

class StateController extends Controller
{
    public function index()
    {
        $states = State::with('cities')
            ->when(\request()->keyword != null, function ($query) {
                $query->search(\request()->keyword);
            })
            ->when(\request()->status != null, function ($query) {
                $query->whereStatus(\request()->status);
            })
            ->orderBy(request()->order_by ?? 'id')
            ->paginate(request()->limit_by ?? 6);

        return view('backend.states.index', compact('states'));
    }

    public function create()
    {

        $countries = Country::all();
        return view('backend.states.create', compact('countries'));

    }


    public function store(StateRequest $request)
    {
        State::create($request->validated());

        return redirect()->route('admin.states.index')->with([
            'message' => 'State Created Successfully',
            'alert-type' => 'success'
        ]);

    }

    public function show(State $state)
    {

    }

    public function edit(State $state)
    {
        return view('backend.states.edit', compact('state'));
    }

    public function update(StateRequest $request, State $state)
    {

        $state->update($request->validated());

        return redirect()->route('admin.states.index')->with([
            'message' => 'State Updated Successfully',
            'alert-type' => 'success'
        ]);
    }

    public function destroy(State $state)
    {

        $state->delete();

        return redirect()->route('admin.states.index')->with([
            'message' => 'State Deleted Successfully',
            'alert-type' => 'danger'
        ]);
    }


    public function get_states(Request $request)
    {
        $states = State::whereCountryId($request->country_id)->get(['id','name'])->toArray();
        return  response()->json($states);
    }
}
