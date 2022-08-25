<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\backend\productRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with('category', 'tags')
            ->when(\request()->keyword != null, function ($query) {
                $query->search(\request()->keyword);
            })
            ->when(\request()->status != null, function ($query) {
                $query->whereStatus(\request()->status);
            })
            ->orderBy(request()->order_by ?? 'id')
            ->paginate(request()->limit_by ?? 6);

        return view('backend.products.index', compact('products'));

    }

    public function create()
    {

        $categories = Category::whereStatus(1)->get(['id', 'name']);
        $tags = Tag::whereStatus(1)->get(['id', 'name']);
        return view('backend.products.create', compact('categories', 'tags'));

    }


    public function store(productRequest $request)
    {

        $input['name'] = $request->name;
        $input['description'] = $request->description;
        $input['price'] = $request->price;
        $input['quantity'] = $request->quantity;
        $input['status'] = $request->status;
        $input['featured'] = $request->featured;
        $input['category_id'] = $request->category_id;


        $product = Product::create($input);

        $product->tags()->attach($request->tags);


        if ($request->images && count($request->images) > 0) {


            //save  in storage
            $i = 1;
            foreach ($request->images as $image) {
                $file_name = Str::slug($request->name) . "_" . time() . '_' . $i . '.' . $image->getClientOriginalExtension();
                $file_size = $image->getSize();
                $file_type = $image->getType();
                $path = public_path('/assets/products/' . $file_name);


                Image::make($image->getRealPath())->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path, 100);

                //save  in DB
                $product->media()->create([
                    'file_name' => $file_name,
                    'file_size' => $file_size,
                    'file_type' => $file_type,
                    'file_status' => true,
                    'file_sort' => $i,
                ]);

                $i++;
            }

        }

        return redirect()->route('admin.products.index')->with([
            'message' => 'Product Created Successfully',
            'alert-type' => 'success'
        ]);

    }

    public function show($id)
    {
        //
    }

    public function edit(Product $product)
    {
        $categories = Category::whereStatus(1)->get(['id', 'name']);
        $tags = Tag::whereStatus(1)->get(['id', 'name']);
        return view('backend.products.edit', compact('categories', 'tags', 'product'));
    }


    public function update(productRequest $request, Product $product)
    {
        $input['name'] = $request->name;
        $input['description'] = $request->description;
        $input['price'] = $request->price;
        $input['quantity'] = $request->quantity;
        $input['status'] = $request->status;
        $input['featured'] = $request->featured;
        $input['category_id'] = $request->category_id;

        $product->update($input);
        $product->tags()->sync($request->tags);


        if ($request->images && count($request->images) > 0) {


            //save  in storage
            $i = $product->media()->count() + 1;
            foreach ($request->images as $image) {
                $file_name = $product->slug . "_" . time() . '_' . $i . '.' . $image->getClientOriginalExtension();
                $file_size = $image->getSize();
                $file_type = $image->getType();
                $path = public_path('/assets/products/' . $file_name);


                Image::make($image->getRealPath())->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path, 100);

                //save  in DB
                $product->media()->create([
                    'file_name' => $file_name,
                    'file_size' => $file_size,
                    'file_type' => $file_type,
                    'file_status' => true,
                    'file_sort' => $i,
                ]);

                $i++;
            }

        }

        return redirect()->route('admin.products.index')->with([
            'message' => 'Product Updated Successfully',
            'alert-type' => 'success'
        ]);
    }


    public function destroy(Product $product)
    {
        if ($product->media()->count() > 0) {

            foreach ($product->media as $media) {
                if (File::exists('assets/products/' . $media->file_name)) {
                    unlink('assets/products/' . $media->file_name);
                }
            }

        }


        $product->delete();

        return redirect()->route('admin.products.index')->with([
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'danger'
        ]);
    }


    public function delete_image(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $image = $product->media()->whereId($request->image_id)->first();
        if (File::exists('assets/products/' . $image->file_name)) {
            unlink('assets/products/' . $image->file_name);

            $image->delete();
        }
        return true;
    }
}
