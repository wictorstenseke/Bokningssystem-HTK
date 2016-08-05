<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Reservation;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ReservationRequest;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::all();

        $futureResesrvations = $reservations->filter(function ($reservation){
            return $reservation->stop > Carbon::now();
        })->sortBy('start');

        $oldResesrvations = $reservations->filter(function ($reservation){
            return $reservation->stop < Carbon::now();
        })->sortByDesc('start');

        return view('index')->with([
            'futureResesrvations'   => $futureResesrvations,
            'oldResesrvations'      => $oldResesrvations,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReservationRequest $request)
    {
        $createdReservation = Reservation::create([
            'name'  => $request->name,
            'start' => Carbon::createFromFormat('Y-m-d H:i', $request->start_date . '' . $request->start_time),
            'stop'  => Carbon::createFromFormat('Y-m-d H:i', $request->start_date . '' . $request->stop_time),
        ]);

        return redirect()->action('ReservationController@success', [$createdReservation]);
        // return view('success')->with(['createdReservation' => $createdReservation]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function success(Reservation $reservation)
    {
        return view('success')->with(['createdReservation' => $reservation]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function softDelete(Reservation $reservation)
    {
        $reservation->delete();
        return $reservation;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $reservation = Reservation::withTrashed()->findOrFail($id);
        $reservation->restore();
        Session::flash('restoredReservation', $reservation);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
