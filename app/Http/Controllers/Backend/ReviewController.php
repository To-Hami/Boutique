<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with(['product', 'user'])
            ->when(\request()->keyword != null, function ($query) {
                $query->search(\request()->keyword);
            })
            ->when(\request()->status != null, function ($query) {
                $query->whereStatus(\request()->status);
            })
            ->orderBy(request()->order_by ?? 'id')
            ->paginate(request()->limit_by ?? 6);

        return view('backend.reviews.index', compact('reviews'));

    }



    public function create( )
    {
        return view('backend.reviews.create');

    }


    public function destroy(Review $review)
    {

        $review->delete();

        return redirect()->route('admin.reviews.index')->with([
            'message' => 'Review Deleted Successfully',
            'alert-type' => 'danger'
        ]);
    }


}
