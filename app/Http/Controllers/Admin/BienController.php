<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Bien\BulkDestroyBien;
use App\Http\Requests\Admin\Bien\DestroyBien;
use App\Http\Requests\Admin\Bien\IndexBien;
use App\Http\Requests\Admin\Bien\StoreBien;
use App\Http\Requests\Admin\Bien\UpdateBien;
use App\Models\Bien;
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

class BienController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexBien $request
     * @return array|Factory|View
     */
    public function index(IndexBien $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Bien::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'libelle', 'adresse', 'prix', 'type', 'surface', 'description', 'image', 'id_user', 'id_agence', 'id_type_bien', 'id_statut_bien', 'id_etat_bien', 'id_localite'],

            // set columns to searchIn
            ['id', 'libelle', 'adresse', 'prix', 'type', 'surface', 'description']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.bien.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.bien.create');

        return view('admin.bien.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBien $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreBien $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Bien
        $bien = Bien::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/biens'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/biens');
    }

    /**
     * Display the specified resource.
     *
     * @param Bien $bien
     * @throws AuthorizationException
     * @return void
     */
    public function show(Bien $bien)
    {
        $this->authorize('admin.bien.show', $bien);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Bien $bien
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Bien $bien)
    {
        $this->authorize('admin.bien.edit', $bien);


        return view('admin.bien.edit', [
            'bien' => $bien,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateBien $request
     * @param Bien $bien
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateBien $request, Bien $bien)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Bien
        $bien->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/biens'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/biens');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyBien $request
     * @param Bien $bien
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyBien $request, Bien $bien)
    {
        $bien->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyBien $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyBien $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Bien::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
