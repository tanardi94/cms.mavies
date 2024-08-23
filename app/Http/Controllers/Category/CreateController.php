<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;

class CreateController extends BaseController
{
    /**
     * Handle the incoming request.
     */

    public function __invoke(Request $request)
    {
        $data = [
            'breadcrumbs' => [
                [
                    'url' => route('pages.category.index'),
                    'title' => 'Manage Categories',
                ],
                [
                    'url' => route('pages.category.create'),
                    'title' => 'Create a New Category',
                ],
            ],
            'parents' => $this->service->getMainCategories(),
        ];


        return view('pages.category.create', $data);
    }
}
