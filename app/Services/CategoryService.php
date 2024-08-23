<?php
namespace App\Services;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryService
{
    public function getCategories()
    {
        return Category::query()
            ->select('id', 'uuid', 'name', 'slug', 'parent_id')
            ->with('parent:id,name,slug')
            ->get();
    }

    public function getMainCategories()
    {
        return Category::query()
            ->select('id', 'name', 'slug')
            ->whereNull('parent_id')
            ->get();
    }

    public function createCategory(Request $request)
    {
        $params = [
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
        ];

        if (!is_null($request->input('parentCategory'))) {
            $parent = $this->getSpecificCategory($request->input('parentCategory'));
            $params['parent_id'] = $parent->id;
        }

        Category::create($params);
    }

    public function updateCategory(Request $request, Category $category)
    {
        $params = [
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
        ];

        if (!is_null($request->input('parentCategory'))) {
            $parent = $this->getSpecificCategory($request->input('parentCategory'));
            $params['parent_id'] = $parent->id;
        }

        $category->update($params);
    }

    private function getSpecificCategory(string $slug)
    {
        return Category::query()
            ->select('id', 'slug')
            ->where('slug', $slug)
            ->first();
    }
}
