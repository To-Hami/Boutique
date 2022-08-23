<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\backend\TagRequest;
use App\Models\Tag;

class TagController extends Controller
{

    public function index()
    {
        $tags = Tag::with('products')
            ->when(\request()->keyword != null, function ($query) {
                $query->search(\request()->keyword);
            })
            ->when(\request()->status != null, function ($query) {
                $query->whereStatus(\request()->status);
            })
            ->orderBy(request()->order_by ?? 'id')
            ->paginate(request()->limit_by ?? 6);

        return view('backend.tags.index', compact('tags'));

    }

    public function create()
    {


        return view('backend.tags.create');

    }

    public function store(TagRequest $request)
    {
        $input['name'] = $request->name;
        $input['status'] = $request->status;


        Tag::create($input);

        return redirect()->route('admin.tags.index')->with([
            'message' => 'Tag Created Successfully',
            'alert-type' => 'success'
        ]);

    }

    public function show($id)
    {
        //
    }

    public function edit(Tag $tag)
    {
        return view('backend.tags.edit', compact('tag'));
    }

    public function update(TagRequest $request, Tag $Tag)
    {
        $input['name'] = $request->name;
        $input['slug'] = null;
        $input['status'] = $request->status;

        $Tag->update($input);

        return redirect()->route('admin.tags.index')->with([
            'message' => 'Tag Updated Successfully',
            'alert-type' => 'success'
        ]);
    }

    public function destroy(Tag $Tag)
    {

        $Tag->delete();

        return redirect()->route('admin.tags.index')->with([
            'message' => 'Tag Deleted Successfully',
            'alert-type' => 'danger'
        ]);
    }


}
