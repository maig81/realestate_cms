<?php

namespace App\Http\Controllers;

use App\City;
use App\Municipality;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class MunicipalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex()
    {
        $cities = City::get()->pluck('name', 'id');
        return view('admin.municipality.index', ['cities' => $cities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'city_id' => 'required|integer',
        ]);

        $municipality = new Municipality([
            'name' => $request->name,
            'city_id' => $request->city_id
        ]);
        return redirect("/admin/municipality/" . $municipality->id);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Municipality  $municipality
     * @return \Illuminate\Http\Response
     */
    public function edit(Municipality $municipality)
    {
        $cities = City::get()->pluck('name', 'id');
        return view('admin.municipality.edit', ['municipality' => $municipality, 'cities' => $cities]);
    }

    /**
     * Admin index data
     * @return datatables
     */    
    public function indexData()
    {
        $data = Municipality::with('city');

        return DataTables::of($data)
            ->addColumn('city_name', function ($data) {
                return $data->city->name;
            })->toJson();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Municipality  $municipality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Municipality $municipality)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'city_id' => 'required|integer',
        ]);

        $municipality->update([
            'name' => $request->name,
            'city_id' => $request->city_id,
        ]);

        flash(trans('alfa.saved'))->success();
        return back();
    }

}
