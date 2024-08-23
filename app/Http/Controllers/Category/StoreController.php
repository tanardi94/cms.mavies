<?php

namespace App\Http\Controllers\Category;

use App\Helpers\NotificationHelper;
use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */

    private $service;

    public function __construct(CategoryService $categoryService)
    {
        $this->service = $categoryService;
    }

    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'parentCategory' => ['nullable', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->with(NotificationHelper::notifyErrorList($validator->errors()));
        }

        DB::beginTransaction();

        try {
            $this->service->createCategory($request);
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()
                ->back()
                ->withInput()
                ->with(NotificationHelper::notifyError($exception));
        }

        DB::commit();
        return redirect()
            ->route('pages.category.index')
            ->with(NotificationHelper::notifySuccess("Category is successfully created"));
    }
}
