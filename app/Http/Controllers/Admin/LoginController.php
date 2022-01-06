<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Login\BulkDestroyLogin;
use App\Http\Requests\Admin\Login\DestroyLogin;
use App\Http\Requests\Admin\Login\IndexLogin;
use App\Http\Requests\Admin\Login\StoreLogin;
use App\Http\Requests\Admin\Login\UpdateLogin;
use App\Models\Login;
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

class LoginController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexLogin $request
     * @return array|Factory|View
     */
    public function index(IndexLogin $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Login::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            [''],

            // set columns to searchIn
            ['']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.login.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.login.create');

        return view('admin.login.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreLogin $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreLogin $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Login
        $login = Login::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/logins'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/logins');
    }

    /**
     * Display the specified resource.
     *
     * @param Login $login
     * @throws AuthorizationException
     * @return void
     */
    public function show(Login $login)
    {
        $this->authorize('admin.login.show', $login);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Login $login
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Login $login)
    {
        $this->authorize('admin.login.edit', $login);


        return view('admin.login.edit', [
            'login' => $login,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateLogin $request
     * @param Login $login
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateLogin $request, Login $login)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Login
        $login->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/logins'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/logins');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyLogin $request
     * @param Login $login
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyLogin $request, Login $login)
    {
        $login->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyLogin $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyLogin $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Login::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
