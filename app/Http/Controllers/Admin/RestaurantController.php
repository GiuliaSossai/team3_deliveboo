<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidationRestaurant;
use App\Restaurant;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\GlobalState\Restorer;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::where('user_id', Auth::id())->get();

        return view('admin.restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.restaurants.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidationRestaurant $request)
    {
        $data = $request->all();

        $new_restaurant = new Restaurant();

        $new_restaurant->fill($data);

        $new_restaurant->user_id = Auth::id();

        $new_restaurant->slug = Restaurant::generateSlug($new_restaurant->name);

        $new_restaurant->save();

        $new_restaurant->categories()->attach($data['categories']);

        return redirect()->route('admin.ristoranti.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $restaurant = Restaurant::where('slug', $slug)->first();

        return view('admin.restaurants.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $restaurant = Restaurant::where('slug', $slug)->first();
        $categories = Category::all();

        return view('admin.restaurants.edit', compact('restaurant', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidationRestaurant $request, Restaurant $restaurant)
    {
        $data = $request->all();

        dd($restaurant);

        $restaurant->update($data);

        return redirect()->route('admin.ristoranti.show', compact('restaurant'));
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
