<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Http\Requests\StoreAdRequest;
use App\Http\Requests\UpdateAdRequest;
use App\Models\CarModel;
use App\Models\Color;
use App\Models\Manufacturer;
use App\Models\Type;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['ads'] = Ad::paginate(42);
        return view('ads.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['colors'] = Color::all();
        $data['types'] = Type::all();
        $data['manufacturers'] = Manufacturer::all();
        $data['carModels'] = CarModel::all();
        return view('ads.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdRequest $request)
    {
        $ad = new Ad();
        $ad->title = $request->post('title');
        $ad->slug = Str::slug($ad->title);
        $ad->content = $request->post('content');
        $ad->years = $request->post('years');
        $ad->price = $request->post('price');
        $ad->image = $request->post('image');
        $ad->vin = $request->post('vin');
        $ad->user_id = Auth::id();
        $ad->views = 0;
        $ad->active = 1;
        $ad->model_id = $request->post('model_id');
        $ad->type_id = $request->post('type_id');
        $ad->category_id = 1;
        $ad->color_id = $request->post('color_id');
        $ad->manufacturer_id = $request->post('manufacturer_id');

        $ad->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $ad)
    {
        $data['ad'] = $ad;
        $ad->views = ++$ad->views;
        $ad->save();

        return view('ads.single', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function edit(Ad $ad)
    {
        $data['colors'] = Color::all();
        $data['types'] = Type::all();
        $data['manufacturers'] = Manufacturer::all();
        $data['car_models'] = CarModel::all();
        $data['ad'] = $ad;
        return view('ads.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdRequest  $request
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdRequest $request, Ad $ad)
    {
        $ad->title = $request->post('title');
        $ad->content = $request->post('content');
        $ad->years = $request->post('years');
        $ad->price = $request->post('price');
        $ad->image = $request->post('image');
        $ad->vin = $request->post('vin');
        $ad->user_id = Auth::id();
        $ad->active = 1;
        $ad->model_id = $request->post('model_id');
        $ad->type_id = $request->post('type_id');
        $ad->category_id = 1;
        $ad->color_id = $request->post('color_id');
        $ad->manufacturer_id = $request->post('manufacturer_id');
        $ad->save();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        //
    }
}
