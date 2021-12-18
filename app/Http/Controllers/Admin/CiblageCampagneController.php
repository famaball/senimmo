<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CiblageCampagne\BulkDestroyCiblageCampagne;
use App\Http\Requests\Admin\CiblageCampagne\DestroyCiblageCampagne;
use App\Http\Requests\Admin\CiblageCampagne\IndexCiblageCampagne;
use App\Http\Requests\Admin\CiblageCampagne\StoreCiblageCampagne;
use App\Http\Requests\Admin\CiblageCampagne\UpdateCiblageCampagne;
use App\Models\CiblageCampagne;
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

class CiblageCampagneController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCiblageCampagne $request
     * @return array|Factory|View
     */
    public function index(IndexCiblageCampagne $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(CiblageCampagne::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'id_ciblage', 'id_campagne'],

            // set columns to searchIn
            ['id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.ciblage-campagne.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.ciblage-campagne.create');

        return view('admin.ciblage-campagne.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCiblageCampagne $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCiblageCampagne $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the CiblageCampagne
        $ciblageCampagne = CiblageCampagne::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/ciblage-campagnes'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/ciblage-campagnes');
    }

    /**
     * Display the specified resource.
     *
     * @param CiblageCampagne $ciblageCampagne
     * @throws AuthorizationException
     * @return void
     */
    public function show(CiblageCampagne $ciblageCampagne)
    {
        $this->authorize('admin.ciblage-campagne.show', $ciblageCampagne);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CiblageCampagne $ciblageCampagne
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(CiblageCampagne $ciblageCampagne)
    {
        $this->authorize('admin.ciblage-campagne.edit', $ciblageCampagne);


        return view('admin.ciblage-campagne.edit', [
            'ciblageCampagne' => $ciblageCampagne,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCiblageCampagne $request
     * @param CiblageCampagne $ciblageCampagne
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCiblageCampagne $request, CiblageCampagne $ciblageCampagne)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values CiblageCampagne
        $ciblageCampagne->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/ciblage-campagnes'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/ciblage-campagnes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCiblageCampagne $request
     * @param CiblageCampagne $ciblageCampagne
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCiblageCampagne $request, CiblageCampagne $ciblageCampagne)
    {
        $ciblageCampagne->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCiblageCampagne $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCiblageCampagne $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    CiblageCampagne::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
