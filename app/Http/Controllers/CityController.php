<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex()
    {
        return view('admin.city.index');
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
        ]);

        $city = new City([
            'name' => $request->name
        ]);
        return redirect("/admin/city/" . $city->id);
    }


     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        return view('admin.city.edit', ['city' => $city]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $city->update([
            'name' => $request->name,
        ]);

        flash(trans('alfa.saved'))->success();
        return back();
    }

    /**
     * Admin index data
     * @return datatables
     */
    public function indexData()
    {
        $data = City::select(['id','name']);
        return Datatables::of($data)->make();
    }
}
