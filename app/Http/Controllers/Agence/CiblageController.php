<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ciblage\BulkDestroyCiblage;
use App\Http\Requests\Admin\Ciblage\DestroyCiblage;
use App\Http\Requests\Admin\Ciblage\IndexCiblage;
use App\Http\Requests\Admin\Ciblage\StoreCiblage;
use App\Http\Requests\Admin\Ciblage\UpdateCiblage;
use App\Models\Ciblage;
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

class CiblageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCiblage $request
     * @return array|Factory|View
     */
    public function index(IndexCiblage $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Ciblage::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'designation'],

            // set columns to searchIn
            ['id', 'designation']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.ciblage.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.ciblage.create');

        return view('admin.ciblage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCiblage $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCiblage $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Ciblage
        $ciblage = Ciblage::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/ciblages'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/ciblages');
    }

    /**
     * Display the specified resource.
     *
     * @param Ciblage $ciblage
     * @throws AuthorizationException
     * @return void
     */
    public function show(Ciblage $ciblage)
    {
        $this->authorize('admin.ciblage.show', $ciblage);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Ciblage $ciblage
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Ciblage $ciblage)
    {
        $this->authorize('admin.ciblage.edit', $ciblage);


        return view('admin.ciblage.edit', [
            'ciblage' => $ciblage,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCiblage $request
     * @param Ciblage $ciblage
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCiblage $request, Ciblage $ciblage)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Ciblage
        $ciblage->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/ciblages'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/ciblages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCiblage $request
     * @param Ciblage $ciblage
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCiblage $request, Ciblage $ciblage)
    {
        $ciblage->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCiblage $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCiblage $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Ciblage::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
