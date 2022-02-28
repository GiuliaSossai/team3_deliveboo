<?php

namespace App\Http\Controllers\Admin;

use App\Dish;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidationDish;
use App\Restaurant;
use App\Type;
use Illuminate\Http\Request;

class DishController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        $types = Type::all();

        $restaurant_id = Restaurant::where('slug', $slug)->first()->id;

        return view('admin.dishes.create', compact('types', 'restaurant_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidationDish $request, $restaurant_id, Restaurant $restaurant)
    {
        $data = $request->all();

        $new_dish = new Dish();

        $new_dish->fill($data);

        $new_dish->restaurant_id = $restaurant_id;

        $new_dish->save();

        $restaurant = Restaurant::where('id', $restaurant_id)->first();

        return redirect()->route('admin.ristoranti.show', $restaurant->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($dish)
    {
        dd($dish);
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
    public function destroy($id)
    {
        //
    }
}
