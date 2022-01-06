<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Typebien\BulkDestroyTypebien;
use App\Http\Requests\Admin\Typebien\DestroyTypebien;
use App\Http\Requests\Admin\Typebien\IndexTypebien;
use App\Http\Requests\Admin\Typebien\StoreTypebien;
use App\Http\Requests\Admin\Typebien\UpdateTypebien;
use App\Models\Typebien;
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

class TypebienController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTypebien $request
     * @return array|Factory|View
     */
    public function index(IndexTypebien $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Typebien::class)->processRequestAndGet(
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

        return view('admin.typebien.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.typebien.create');

        return view('admin.typebien.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTypebien $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTypebien $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Typebien
        $typebien = Typebien::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/typebiens'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/typebiens');
    }

    /**
     * Display the specified resource.
     *
     * @param Typebien $typebien
     * @throws AuthorizationException
     * @return void
     */
    public function show(Typebien $typebien)
    {
        $this->authorize('admin.typebien.show', $typebien);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Typebien $typebien
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Typebien $typebien)
    {
        $this->authorize('admin.typebien.edit', $typebien);


        return view('admin.typebien.edit', [
            'typebien' => $typebien,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTypebien $request
     * @param Typebien $typebien
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTypebien $request, Typebien $typebien)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Typebien
        $typebien->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/typebiens'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/typebiens');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTypebien $request
     * @param Typebien $typebien
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTypebien $request, Typebien $typebien)
    {
        $typebien->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTypebien $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTypebien $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Typebien::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
