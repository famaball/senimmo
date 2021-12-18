<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Campagne\BulkDestroyCampagne;
use App\Http\Requests\Admin\Campagne\DestroyCampagne;
use App\Http\Requests\Admin\Campagne\IndexCampagne;
use App\Http\Requests\Admin\Campagne\StoreCampagne;
use App\Http\Requests\Admin\Campagne\UpdateCampagne;
use App\Models\Campagne;
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

class CampagneController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCampagne $request
     * @return array|Factory|View
     */
    public function index(IndexCampagne $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Campagne::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nom', 'sujet', 'contenu', 'nom_emetteur', 'email_emetteur', 'send_to_all'],

            // set columns to searchIn
            ['id', 'nom', 'sujet', 'contenu', 'nom_emetteur', 'email_emetteur', 'send_to_all']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.campagne.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.campagne.create');

        return view('admin.campagne.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCampagne $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCampagne $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Campagne
        $campagne = Campagne::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/campagnes'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/campagnes');
    }

    /**
     * Display the specified resource.
     *
     * @param Campagne $campagne
     * @throws AuthorizationException
     * @return void
     */
    public function show(Campagne $campagne)
    {
        $this->authorize('admin.campagne.show', $campagne);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Campagne $campagne
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Campagne $campagne)
    {
        $this->authorize('admin.campagne.edit', $campagne);


        return view('admin.campagne.edit', [
            'campagne' => $campagne,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCampagne $request
     * @param Campagne $campagne
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCampagne $request, Campagne $campagne)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Campagne
        $campagne->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/campagnes'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/campagnes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCampagne $request
     * @param Campagne $campagne
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCampagne $request, Campagne $campagne)
    {
        $campagne->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCampagne $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCampagne $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Campagne::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
