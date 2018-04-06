<?php

namespace App\Http\Controllers;

use App\Property;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class PropertyController extends Controller
{


    /**
     * List view for Admin
     * @return view
     */
    public function adminIndex()
    {
        return view('admin.property.index');
    }


    /**
     * Admin index data
     * @return datatables
     */    
    public function indexData()
    {
        $data = Property::with(['street', 'location'])->orderBy('published', 'created_at');

        return DataTables::of($data)
            ->addColumn('street', function (Property $data) {
                return $data->street->name;
            })->addColumn('location', function (Property $data) {
                return $data->location->name;
            })
            ->toJson();        

 return DataTables::eloquent($model)
                ->addColumn('posts', function (User $user) {
                    return $user->posts->map(function($post) {
                        return str_limit($post->title, 30, '...');
                    })->implode('<br>');
                })
                ->toJson();            
    }
}
