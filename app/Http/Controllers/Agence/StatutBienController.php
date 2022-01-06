<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StatutBien\BulkDestroyStatutBien;
use App\Http\Requests\Admin\StatutBien\DestroyStatutBien;
use App\Http\Requests\Admin\StatutBien\IndexStatutBien;
use App\Http\Requests\Admin\StatutBien\StoreStatutBien;
use App\Http\Requests\Admin\StatutBien\UpdateStatutBien;
use App\Models\StatutBien;
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

class StatutBienController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexStatutBien $request
     * @return array|Factory|View
     */
    public function index(IndexStatutBien $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(StatutBien::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'designation', 'description'],

            // set columns to searchIn
            ['id', 'designation', 'description']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.statut-bien.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.statut-bien.create');

        return view('admin.statut-bien.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreStatutBien $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreStatutBien $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the StatutBien
        $statutBien = StatutBien::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/statut-biens'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/statut-biens');
    }

    /**
     * Display the specified resource.
     *
     * @param StatutBien $statutBien
     * @throws AuthorizationException
     * @return void
     */
    public function show(StatutBien $statutBien)
    {
        $this->authorize('admin.statut-bien.show', $statutBien);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param StatutBien $statutBien
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(StatutBien $statutBien)
    {
        $this->authorize('admin.statut-bien.edit', $statutBien);


        return view('admin.statut-bien.edit', [
            'statutBien' => $statutBien,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateStatutBien $request
     * @param StatutBien $statutBien
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateStatutBien $request, StatutBien $statutBien)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values StatutBien
        $statutBien->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/statut-biens'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/statut-biens');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyStatutBien $request
     * @param StatutBien $statutBien
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyStatutBien $request, StatutBien $statutBien)
    {
        $statutBien->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyStatutBien $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyStatutBien $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    StatutBien::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
