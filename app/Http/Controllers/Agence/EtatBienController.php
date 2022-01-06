<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EtatBien\BulkDestroyEtatBien;
use App\Http\Requests\Admin\EtatBien\DestroyEtatBien;
use App\Http\Requests\Admin\EtatBien\IndexEtatBien;
use App\Http\Requests\Admin\EtatBien\StoreEtatBien;
use App\Http\Requests\Admin\EtatBien\UpdateEtatBien;
use App\Models\EtatBien;
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

class EtatBienController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexEtatBien $request
     * @return array|Factory|View
     */
    public function index(IndexEtatBien $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(EtatBien::class)->processRequestAndGet(
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

        return view('admin.etat-bien.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.etat-bien.create');

        return view('admin.etat-bien.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEtatBien $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreEtatBien $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the EtatBien
        $etatBien = EtatBien::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/etat-biens'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/etat-biens');
    }

    /**
     * Display the specified resource.
     *
     * @param EtatBien $etatBien
     * @throws AuthorizationException
     * @return void
     */
    public function show(EtatBien $etatBien)
    {
        $this->authorize('admin.etat-bien.show', $etatBien);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param EtatBien $etatBien
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(EtatBien $etatBien)
    {
        $this->authorize('admin.etat-bien.edit', $etatBien);


        return view('admin.etat-bien.edit', [
            'etatBien' => $etatBien,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEtatBien $request
     * @param EtatBien $etatBien
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateEtatBien $request, EtatBien $etatBien)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values EtatBien
        $etatBien->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/etat-biens'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/etat-biens');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyEtatBien $request
     * @param EtatBien $etatBien
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyEtatBien $request, EtatBien $etatBien)
    {
        $etatBien->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyEtatBien $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyEtatBien $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    EtatBien::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
