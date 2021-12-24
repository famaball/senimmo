<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ReservationBien\BulkDestroyReservationBien;
use App\Http\Requests\Admin\ReservationBien\DestroyReservationBien;
use App\Http\Requests\Admin\ReservationBien\IndexReservationBien;
use App\Http\Requests\Admin\ReservationBien\StoreReservationBien;
use App\Http\Requests\Admin\ReservationBien\UpdateReservationBien;
use App\Models\Bien;
use App\Models\Reservation;
use App\Models\ReservationBien;
use App\Models\User;
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

class ReservationBienController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexReservationBien $request
     * @return array|Factory|View
     */
    public function index(IndexReservationBien $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(ReservationBien::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'id_users', 'id_bien', 'id_reservation', 'date_reservation'],

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

        return view('admin.reservation-bien.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $users= User::all();
        $reservation=Reservation::all();
        $bien=Bien::all();
        $this->authorize('admin.reservation-bien.create');

        return view('admin.reservation-bien.create',compact('reservation', 'bien','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreReservationBien $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreReservationBien $request)
    {
        // Sanitize input
        //$sanitized = $request->getSanitized();

        // Store the ReservationBien
        //$reservationBien = ReservationBien::create($sanitized);
        $reservationbien = new ReservationBien();
        $reservationbien->id_users = $request['id_users']=$request['id_users'];
        $reservationbien->id_bien = $request['id_bien']=$request['id_bien'];
        $reservationbien->id_reservation = $request['id_reservation']=$request['id_reservation'];
        $reservationbien->date_reservation = $request['date_reservation']=$request['date_reservation'];
        $reservationbien->save();
        if ($request->ajax()) {
            return ['redirect' => url('admin/reservation-biens'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/reservation-biens');
    }

    /**
     * Display the specified resource.
     *
     * @param ReservationBien $reservationBien
     * @throws AuthorizationException
     * @return void
     */
    public function show(ReservationBien $reservationBien)
    {
        $this->authorize('admin.reservation-bien.show', $reservationBien);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ReservationBien $reservationBien
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(ReservationBien $reservationBien)
    {
        $this->authorize('admin.reservation-bien.edit', $reservationBien);


        return view('admin.reservation-bien.edit', [
            'reservationBien' => $reservationBien,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateReservationBien $request
     * @param ReservationBien $reservationBien
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateReservationBien $request, ReservationBien $reservationBien)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values ReservationBien
        $reservationBien->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/reservation-biens'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/reservation-biens');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyReservationBien $request
     * @param ReservationBien $reservationBien
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyReservationBien $request, ReservationBien $reservationBien)
    {
        $reservationBien->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyReservationBien $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyReservationBien $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    ReservationBien::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
