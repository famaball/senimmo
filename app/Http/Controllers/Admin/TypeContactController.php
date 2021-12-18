<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TypeContact\BulkDestroyTypeContact;
use App\Http\Requests\Admin\TypeContact\DestroyTypeContact;
use App\Http\Requests\Admin\TypeContact\IndexTypeContact;
use App\Http\Requests\Admin\TypeContact\StoreTypeContact;
use App\Http\Requests\Admin\TypeContact\UpdateTypeContact;
use App\Models\TypeContact;
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

class TypeContactController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTypeContact $request
     * @return array|Factory|View
     */
    public function index(IndexTypeContact $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(TypeContact::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'libelle'],

            // set columns to searchIn
            ['id', 'libelle']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.type-contact.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.type-contact.create');

        return view('admin.type-contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTypeContact $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTypeContact $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the TypeContact
        $typeContact = TypeContact::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/type-contacts'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/type-contacts');
    }

    /**
     * Display the specified resource.
     *
     * @param TypeContact $typeContact
     * @throws AuthorizationException
     * @return void
     */
    public function show(TypeContact $typeContact)
    {
        $this->authorize('admin.type-contact.show', $typeContact);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TypeContact $typeContact
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(TypeContact $typeContact)
    {
        $this->authorize('admin.type-contact.edit', $typeContact);


        return view('admin.type-contact.edit', [
            'typeContact' => $typeContact,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTypeContact $request
     * @param TypeContact $typeContact
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTypeContact $request, TypeContact $typeContact)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values TypeContact
        $typeContact->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/type-contacts'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/type-contacts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTypeContact $request
     * @param TypeContact $typeContact
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTypeContact $request, TypeContact $typeContact)
    {
        $typeContact->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTypeContact $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTypeContact $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    TypeContact::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
