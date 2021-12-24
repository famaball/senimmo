<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactCampagne\BulkDestroyContactCampagne;
use App\Http\Requests\Admin\ContactCampagne\DestroyContactCampagne;
use App\Http\Requests\Admin\ContactCampagne\IndexContactCampagne;
use App\Http\Requests\Admin\ContactCampagne\StoreContactCampagne;
use App\Http\Requests\Admin\ContactCampagne\UpdateContactCampagne;
use App\Models\Campagne;
use App\Models\Contact;
use App\Models\ContactCampagne;
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

class ContactCampagneController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexContactCampagne $request
     * @return array|Factory|View
     */
    public function index(IndexContactCampagne $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(ContactCampagne::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'id_type_contact', 'id_campagne', 'id_contact'],

            // set columns to searchIn
            ['id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.contact-campagne.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {

        $contact=Contact::all();
        $type_contact=TypeContact::all();
        $campagne=Campagne::all();
        $this->authorize('admin.contact-campagne.create');

        return view('admin.contact-campagne.create',compact('contact', 'type_contact', 'campagne'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreContactCampagne $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreContactCampagne $request)
    {
        // Sanitize input
       // $sanitized = $request->getSanitized();

        // Store the ContactCampagne
        //$contactCampagne = ContactCampagne::create($sanitized);
        $contactcampagne= new ContactCampagne();
        $contactcampagne->id_contact = $request['id_contact']=$request['id_contact'];
        $contactcampagne->id_type_contact = $request['id_type_contact']=$request['id_type_contact'];
        $contactcampagne->id_campagne= $request['id_campagne']=$request['id_campagne'];
        $contactcampagne->save();


        if ($request->ajax()) {
            return ['redirect' => url('admin/contact-campagnes'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/contact-campagnes');
    }

    /**
     * Display the specified resource.
     *
     * @param ContactCampagne $contactCampagne
     * @throws AuthorizationException
     * @return void
     */
    public function show(ContactCampagne $contactCampagne)
    {
        $this->authorize('admin.contact-campagne.show', $contactCampagne);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ContactCampagne $contactCampagne
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(ContactCampagne $contactCampagne)
    {
        $this->authorize('admin.contact-campagne.edit', $contactCampagne);


        return view('admin.contact-campagne.edit', [
            'contactCampagne' => $contactCampagne,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateContactCampagne $request
     * @param ContactCampagne $contactCampagne
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateContactCampagne $request, ContactCampagne $contactCampagne)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values ContactCampagne
        $contactCampagne->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/contact-campagnes'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/contact-campagnes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyContactCampagne $request
     * @param ContactCampagne $contactCampagne
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyContactCampagne $request, ContactCampagne $contactCampagne)
    {
        $contactCampagne->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyContactCampagne $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyContactCampagne $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    ContactCampagne::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
