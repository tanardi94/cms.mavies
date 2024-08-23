<?php

namespace App\Http\Controllers\Category;

use App\Models\Category;
use Illuminate\Http\Request;

class EditController extends BaseController
{
    /**
     * Handle the incoming request.
     */

    public function __invoke(Request $request, Category $category)
    {
        $data = [
            'breadcrumbs' => [
                [
                    'url' => route('pages.category.index'),
                    'title' => 'Manage Categories',
                ],
                [
                    'url' => route('pages.category.edit', $category->uuid),
                    'title' => 'Edit a New Category',
                ],
            ],
            'parents' => $this->service->getMainCategories(),
            'category' => $category,
        ];


        return view('pages.category.edit', $data);
    }
}
