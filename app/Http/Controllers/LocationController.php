<?php

namespace App\Http\Controllers;

use App\Location;
use App\Municipality;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex()
    {
        $municipalities = Municipality::get()->pluck('name', 'id');
        return view('admin.location.index', ['municipalities' => $municipalities]);
    }

    /**
     * Admin index data
     * @return datatables
     */
    public function indexData()
    {
        //$data = Location::select(['id','name']);
        $data = Location::with('municipality');

        return DataTables::of($data)
            ->addColumn('municipality_name', function ($data) {
                return $data->municipality->name;
            })->addColumn('city_name', function ($data) {
                return $data->municipality->city->name;
            })->toJson();

        // return Datatables::of($data)->make();
    }

    /**
     * Create location
     */
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'municipality_id' => 'required|integer',
        ]);

        $location = new Location([
            'name' => $request->name,
            'municipality_id' => $request->municipality_id
        ]);

        $location->save();

        return redirect("/admin/locations/" . $location->id);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        $municipalities = Municipality::get()->pluck('name', 'id');
        return view('admin.location.edit', ['location' => $location, 'municipalities' => $municipalities]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'municipality_id' => 'required|integer',
        ]);

        $location->update([
            'name' => $request->name,
            'municipality_id' => $request->municipality_id,
        ]);

        flash(trans('alfa.saved'))->success();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        //
    }
}
