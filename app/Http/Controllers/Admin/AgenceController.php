<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Agence\BulkDestroyAgence;
use App\Http\Requests\Admin\Agence\DestroyAgence;
use App\Http\Requests\Admin\Agence\IndexAgence;
use App\Http\Requests\Admin\Agence\StoreAgence;
use App\Http\Requests\Admin\Agence\UpdateAgence;
use App\Models\Agence;
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

class AgenceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexAgence $request
     * @return array|Factory|View
     */
    public function index(IndexAgence $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Agence::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nom', 'adresse', 'telephone', 'email', 'email_verified_at'],

            // set columns to searchIn
            ['id', 'nom', 'adresse', 'telephone', 'email']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.agence.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.agence.create');

        return view('admin.agence.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAgence $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreAgence $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Agence
        $agence = Agence::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/agences'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/agences');
    }

    /**
     * Display the specified resource.
     *
     * @param Agence $agence
     * @throws AuthorizationException
     * @return void
     */
    public function show(Agence $agence)
    {
        $this->authorize('admin.agence.show', $agence);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Agence $agence
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Agence $agence)
    {
        $this->authorize('admin.agence.edit', $agence);


        return view('admin.agence.edit', [
            'agence' => $agence,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAgence $request
     * @param Agence $agence
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateAgence $request, Agence $agence)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Agence
        $agence->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/agences'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/agences');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyAgence $request
     * @param Agence $agence
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyAgence $request, Agence $agence)
    {
        $agence->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyAgence $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyAgence $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Agence::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
