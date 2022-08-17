<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\backend\categoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::withCount('products')
            ->when(\request()->keyword != null, function ($query) {
                $query->search(\request()->keyword);
            })
            ->when(\request()->status != null, function ($query) {
                $query->whereStatus(\request()->status);
            })
            ->orderBy(request()->order_by ?? 'id')
            ->paginate(request()->limit_by ?? 6);

        return view('backend.categories.index', compact('categories'));

    }

    public function create()
    {

        $main_categories = Category::whereNull('parent_id')->get(['id', 'name']);
        return view('backend.categories.create', compact('main_categories'));

    }


    public function store(categoryRequest $request)
    {
        $input['name'] = $request->name;
        $input['status'] = $request->status;
        $input['parent_id'] = $request->parent_id;


        if ($image = $request->file('cover')) {
            //save  in storage

            $file_name = Str::slug($request->name) . "." . $image->getClientOriginalExtension();
            $path = public_path('/assets/categories/' . $file_name);

            Image::make($image->getRealPath())->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);


            //save  in DB
            $input['cover'] = $file_name;

        }

        Category::create($input);

        return redirect()->route('admin.categories.index')->with([
            'message' => 'Category Created Successfully',
            'alert-type' => 'success'
        ]);

    }

    public function show($id)
    {
        //
    }

    public function edit(Category $category)
    {
        $main_categories = Category::whereNull('parent_id')->get(['id', 'name']);
        return view('backend.categories.edit', compact('main_categories', 'category'));
    }


    public function update(categoryRequest $request, Category $category)
    {
        $input['name'] = $request->name;
        $input['slug'] = null;
        $input['status'] = $request->status;
        $input['parent_id'] = $request->parent_id;


        if ($image = $request->file('cover')) {


            if ($category->cover != null && File::exists('assets/categories/' . $category->cover)) {
                unlink('assets/categories/' . $category->cover);

            }
            //save  in storage

            $file_name = Str::slug($request->name) . "." . $image->getClientOriginalExtension();
            $path = public_path('/assets/categories/' . $file_name);

            Image::make($image->getRealPath())->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);


            //save  in DB
            $input['cover'] = $file_name;

        }

        $category->update($input);

        return redirect()->route('admin.categories.index')->with([
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        ]);
    }


    public function destroy(Category $category)
    {
        if (File::exists('assets/categories/' . $category->cover)) {
            unlink('assets/categories/' . $category->cover);
        }

        $category->delete();

        return redirect()->route('admin.categories.index')->with([
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'danger'
        ]);
    }


    public function delete_image(Request $request)
    {
        $category = Category::findOrFail($request->category_id);
        if (File::exists('assets/categories/' . $category->cover)) {
            unlink('assets/categories/' . $category->cover);
            $category->cover = null;
            $category->save();

        }
        return true;
    }
}

