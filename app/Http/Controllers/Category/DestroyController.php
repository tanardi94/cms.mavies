<?php

namespace App\Http\Controllers\Category;

use App\Helpers\NotificationHelper;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DestroyController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Category $category)
    {
        DB::beginTransaction();

        try {
            $category->delete();
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()
                ->back()
                ->with(NotificationHelper::notifyError($exception));
        }

        DB::commit();
        return redirect()
            ->route('pages.category.index')
            ->with(NotificationHelper::notifySuccess("Category has been deleted"));
    }
}
