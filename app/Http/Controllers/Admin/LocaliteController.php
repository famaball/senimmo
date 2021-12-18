<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Localite\BulkDestroyLocalite;
use App\Http\Requests\Admin\Localite\DestroyLocalite;
use App\Http\Requests\Admin\Localite\IndexLocalite;
use App\Http\Requests\Admin\Localite\StoreLocalite;
use App\Http\Requests\Admin\Localite\UpdateLocalite;
use App\Models\Localite;
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

class LocaliteController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexLocalite $request
     * @return array|Factory|View
     */
    public function index(IndexLocalite $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Localite::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nom'],

            // set columns to searchIn
            ['id', 'nom']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.localite.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.localite.create');

        return view('admin.localite.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreLocalite $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreLocalite $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Localite
        $localite = Localite::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/localites'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/localites');
    }

    /**
     * Display the specified resource.
     *
     * @param Localite $localite
     * @throws AuthorizationException
     * @return void
     */
    public function show(Localite $localite)
    {
        $this->authorize('admin.localite.show', $localite);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Localite $localite
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Localite $localite)
    {
        $this->authorize('admin.localite.edit', $localite);


        return view('admin.localite.edit', [
            'localite' => $localite,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateLocalite $request
     * @param Localite $localite
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateLocalite $request, Localite $localite)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Localite
        $localite->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/localites'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/localites');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyLocalite $request
     * @param Localite $localite
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyLocalite $request, Localite $localite)
    {
        $localite->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyLocalite $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyLocalite $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Localite::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
