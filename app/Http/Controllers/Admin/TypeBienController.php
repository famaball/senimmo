<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TypeBien\BulkDestroyTypeBien;
use App\Http\Requests\Admin\TypeBien\DestroyTypeBien;
use App\Http\Requests\Admin\TypeBien\IndexTypeBien;
use App\Http\Requests\Admin\TypeBien\StoreTypeBien;
use App\Http\Requests\Admin\TypeBien\UpdateTypeBien;
use App\Models\TypeBien;
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

class TypeBienController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTypeBien $request
     * @return array|Factory|View
     */
    public function index(IndexTypeBien $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(TypeBien::class)->processRequestAndGet(
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

        return view('admin.type-bien.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.type-bien.create');

        return view('admin.type-bien.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTypeBien $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTypeBien $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the TypeBien
        $typeBien = TypeBien::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/type-biens'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/type-biens');
    }

    /**
     * Display the specified resource.
     *
     * @param TypeBien $typeBien
     * @throws AuthorizationException
     * @return void
     */
    public function show(TypeBien $typeBien)
    {
        $this->authorize('admin.type-bien.show', $typeBien);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TypeBien $typeBien
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(TypeBien $typeBien)
    {
        $this->authorize('admin.type-bien.edit', $typeBien);


        return view('admin.type-bien.edit', [
            'typeBien' => $typeBien,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTypeBien $request
     * @param TypeBien $typeBien
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTypeBien $request, TypeBien $typeBien)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values TypeBien
        $typeBien->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/type-biens'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/type-biens');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTypeBien $request
     * @param TypeBien $typeBien
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTypeBien $request, TypeBien $typeBien)
    {
        $typeBien->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTypeBien $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTypeBien $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    TypeBien::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
