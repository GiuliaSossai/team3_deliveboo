<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Dish;
use App\Http\Controllers\Controller;
use App\Restaurant;
use App\Type;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $success = true;

        $restaurants = Restaurant::with(['categories', 'dishes'])->get();
        $categories = Category::all();

        return response()->json(compact('success', 'restaurants', 'categories'));
    }

    public function show($slug)
    {
        $success = true;

        $restaurant = Restaurant::where('slug', $slug)->with(['categories', 'dishes'])->first();

        // Prendo anche solo i tipi dei piatti presenti nel ristorante 
        $dishes = $restaurant->dishes;
        $type_id = [];
        foreach ($dishes as $dish) {
            // condizione dove controllo se è presente
            if (!in_array($dish->type_id, $type_id)) {
                array_push($type_id, $dish->type_id);
            }
        }
        // mi creo un array con tutti i dati di $type 
        $types = [];
        for ($i = 0; $i < count($type_id); $i++) {
            $type = Type::where('id', $type_id[$i])->first();
            array_push($types, $type);
        }

        // se sbaglio a cercare il ristorante, ottengo:
        if (!$restaurant) {
            $restaurant = ['name' => "Il ristorante che hai cercato non esiste!"];
        }

        return response()->json(compact('success', 'restaurant', 'types'));
    }

    //funzione per ottenere la lista dei ristoranti filtrati per categoria
    public function getRestaurantsByCategory($slug_cat)
    {
        $category = Category::where('slug', $slug_cat)->with('restaurants.dishes')->first();

        //controllo errori
        $error = '';
        $success = true;

        if (!$category) {
            $success = false;
            $error = 'Categoria non trovata';
        } elseif ($category && count($category['restaurants']) === 0) {
            $success = false;
            $error = 'Questa categoria non ha nessun ristorante';
        }

        return response()->json(compact('category', 'error', 'success'));
    }
}
