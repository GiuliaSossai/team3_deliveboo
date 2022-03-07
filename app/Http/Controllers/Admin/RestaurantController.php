<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidationRestaurant;
use App\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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

        if (array_key_exists('photo', $data)) {

            $img_path = Storage::put('uploads', $data['photo']);
            $data['photo'] = 'storage/' . $img_path;
        }

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
    public function update(ValidationRestaurant $request, $id)
    {
        $restaurant = Restaurant::find($id);

        $data = $request->all();

        if ($data['name'] != $restaurant->name) {
            $data['slug'] = Restaurant::generateSlug($data['name']);
        }

        if (array_key_exists('photo', $data)) {

            if ($restaurant->photo) {
                $restaurant->photo = str_replace('storage/', '', $restaurant->photo);
                Storage::delete($restaurant->photo);
            }

            $img_path = Storage::put('uploads', $data['photo']);
            $data['photo'] = 'storage/' . $img_path;
        }

        $restaurant->update($data);

        $restaurant->categories()->sync($data['categories']);

        return redirect()->route('admin.ristoranti.show', $restaurant->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $restaurant = Restaurant::find($id);

        if ($restaurant->photo) {
            $restaurant->photo = str_replace('storage/', '', $restaurant->photo);
            Storage::delete($restaurant->photo);
        }

        $restaurant->delete();

        return redirect()->route('admin.ristoranti.index');
    }
}
