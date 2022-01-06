<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TypeCampagne\BulkDestroyTypeCampagne;
use App\Http\Requests\Admin\TypeCampagne\DestroyTypeCampagne;
use App\Http\Requests\Admin\TypeCampagne\IndexTypeCampagne;
use App\Http\Requests\Admin\TypeCampagne\StoreTypeCampagne;
use App\Http\Requests\Admin\TypeCampagne\UpdateTypeCampagne;
use App\Models\TypeCampagne;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TypeCampagneController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTypeCampagne $request
     * @return array|Factory|View
     */
    public function index(IndexTypeCampagne $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(TypeCampagne::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'description'],

            // set columns to searchIn
            ['id', 'description']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.type-campagne.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.type-campagne.create');

        return view('admin.type-campagne.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTypeCampagne $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTypeCampagne $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the TypeCampagne
        $typeCampagne = TypeCampagne::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/type-campagnes'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/type-campagnes');
    }

    /**
     * Display the specified resource.
     *
     * @param TypeCampagne $typeCampagne
     * @throws AuthorizationException
     * @return void
     */
    public function show(TypeCampagne $typeCampagne)
    {
        $this->authorize('admin.type-campagne.show', $typeCampagne);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TypeCampagne $typeCampagne
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(TypeCampagne $typeCampagne)
    {
        $this->authorize('admin.type-campagne.edit', $typeCampagne);


        return view('admin.type-campagne.edit', [
            'typeCampagne' => $typeCampagne,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTypeCampagne $request
     * @param TypeCampagne $typeCampagne
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTypeCampagne $request, TypeCampagne $typeCampagne)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values TypeCampagne
        $typeCampagne->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/type-campagnes'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/type-campagnes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTypeCampagne $request
     * @param TypeCampagne $typeCampagne
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTypeCampagne $request, TypeCampagne $typeCampagne)
    {
        $typeCampagne->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTypeCampagne $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTypeCampagne $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    TypeCampagne::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
