<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DatatableController extends BaseController
{
    /**
     * Handle the incoming request.
     */

    public function __invoke(Request $request)
    {
        $categories = $this->service->getCategories();
        return DataTables::of($categories)
            ->addColumn('name', function ($category) {
                return $category->name;
            })
            ->addColumn('slug', function ($category) {
                return $category->slug;
            })
            ->addColumn('parent', function ($category) {
                return $category->parent->name ?? "-";
            })
            ->addColumn('action', function ($category) {
                return view('pages.category.action', compact('category'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
