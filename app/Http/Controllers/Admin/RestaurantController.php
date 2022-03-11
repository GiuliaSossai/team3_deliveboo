<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Dish;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidationRestaurant;
use App\Restaurant;
use App\Type;
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

        if (array_key_exists('photo_bg', $data)) {

            $img_path = Storage::put('uploads', $data['photo_bg']);
            $data['photo_bg'] = 'storage/' . $img_path;
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
        $restaurant_id = $restaurant->id; 
        $dishes = Dish::where('restaurant_id', $restaurant_id)->orderBy('type_id')->get();
        
        $type_id = [];
        foreach ($dishes as $dish) {
            // condizione dove controllo se è presente
            if ($dish->visible == 1) {
                if (!in_array($dish->type_id, $type_id)) {
                    array_push($type_id, $dish->type_id);
                }
            }
        }
        // mi creo un array con tutti i dati di $type 
        $types = [];
        for ($i = 0; $i < count($type_id); $i++) {
            $type = Type::where('id', $type_id[$i])->first();
            array_push($types, $type);
        }
        
        return view('admin.restaurants.show', compact('restaurant', 'dishes', 'types'));
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

        if (array_key_exists('photo_bg', $data)) {

            if ($restaurant->photo_bg) {
                $restaurant->photo_bg = str_replace('storage/', '', $restaurant->photo_bg);
                Storage::delete($restaurant->photo_bg);
            }

            $img_path = Storage::put('uploads', $data['photo_bg']);
            $data['photo_bg'] = 'storage/' . $img_path;
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

        if ($restaurant->photo_bg) {
            $restaurant->photo_bg = str_replace('storage/', '', $restaurant->photo_bg);
            Storage::delete($restaurant->photo_bg);
        }

        $restaurant->delete();

        return redirect()->route('admin.ristoranti.index');
    }
}
