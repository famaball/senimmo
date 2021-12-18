<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StatutCampagne\BulkDestroyStatutCampagne;
use App\Http\Requests\Admin\StatutCampagne\DestroyStatutCampagne;
use App\Http\Requests\Admin\StatutCampagne\IndexStatutCampagne;
use App\Http\Requests\Admin\StatutCampagne\StoreStatutCampagne;
use App\Http\Requests\Admin\StatutCampagne\UpdateStatutCampagne;
use App\Models\StatutCampagne;
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

class StatutCampagneController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexStatutCampagne $request
     * @return array|Factory|View
     */
    public function index(IndexStatutCampagne $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(StatutCampagne::class)->processRequestAndGet(
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

        return view('admin.statut-campagne.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.statut-campagne.create');

        return view('admin.statut-campagne.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreStatutCampagne $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreStatutCampagne $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the StatutCampagne
        $statutCampagne = StatutCampagne::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/statut-campagnes'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/statut-campagnes');
    }

    /**
     * Display the specified resource.
     *
     * @param StatutCampagne $statutCampagne
     * @throws AuthorizationException
     * @return void
     */
    public function show(StatutCampagne $statutCampagne)
    {
        $this->authorize('admin.statut-campagne.show', $statutCampagne);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param StatutCampagne $statutCampagne
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(StatutCampagne $statutCampagne)
    {
        $this->authorize('admin.statut-campagne.edit', $statutCampagne);


        return view('admin.statut-campagne.edit', [
            'statutCampagne' => $statutCampagne,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateStatutCampagne $request
     * @param StatutCampagne $statutCampagne
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateStatutCampagne $request, StatutCampagne $statutCampagne)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values StatutCampagne
        $statutCampagne->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/statut-campagnes'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/statut-campagnes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyStatutCampagne $request
     * @param StatutCampagne $statutCampagne
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyStatutCampagne $request, StatutCampagne $statutCampagne)
    {
        $statutCampagne->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyStatutCampagne $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyStatutCampagne $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    StatutCampagne::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
