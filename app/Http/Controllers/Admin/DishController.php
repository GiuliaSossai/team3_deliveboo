<?php

namespace App\Http\Controllers\Admin;

use App\Dish;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidationDish;
use App\Restaurant;
use App\Type;
use Illuminate\Support\Facades\Storage;

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
    public function store(ValidationDish $request, $restaurant_id)
    {
        $data = $request->all();

        $new_dish = new Dish();

        if (array_key_exists('photo', $data)) {

            $img_path = Storage::put('uploads', $data['photo']);
            $data['photo'] = 'storage/' . $img_path;
        }

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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($restaurant_slug, $dish_id)
    {
        $types = Type::all();
        $dish = Dish::find($dish_id);

        return view('admin.dishes.edit', compact('restaurant_slug', 'dish', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidationDish $request, $restaurant_slug, $dish_id)
    {

        $dish = Dish::find($dish_id);

        $data = $request->all();

        if (!array_key_exists('visible',  $data)) {
            $data['visible'] = '1';
        }

        if (array_key_exists('photo', $data)) {

            if ($dish->photo) {
                $dish->photo = str_replace('storage/', '', $dish->photo);
                Storage::delete($dish->photo);
            }

            $img_path = Storage::put('uploads', $data['photo']);
            $data['photo'] = 'storage/' . $img_path;
        }

        $dish->update($data);

        return redirect()->route('admin.ristoranti.show', $restaurant_slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($restaurant_slug, $dish_id)
    {
        $dish = Dish::find($dish_id);

        if ($dish->photo) {
            $dish->photo = str_replace('storage/', '', $dish->photo);
            Storage::delete($dish->photo);
        }

        $dish->delete();

        return redirect()->route('admin.ristoranti.show', $restaurant_slug);
    }
}
