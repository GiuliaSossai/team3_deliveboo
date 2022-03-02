<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Dish;
use App\Http\Controllers\Controller;
use App\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(){
        $restaurants = Restaurant::with(['categories', 'dishes'])->get();
        $categories = Category::all();
        //$categories = Category::all();

        $error = '';
        $success = true;

        return response()->json(compact('restaurants', 'categories', 'error', 'success'));
    }

    public function show($slug){
        $restaurant = Restaurant::where('slug', $slug)->with(['categories', 'dishes'])->first();

        // se sbaglio a cercare il ristorante, ottengo:
        if(!$restaurant){
            $restaurant = ['name' => "Il ristorante che hai cercato non esiste!"];
        }

        return response()->json($restaurant);
    }

    //funzione per ottenere la lista dei ristoranti filtrati per categoria
    public function getRestaurantsByCategory($slug_cat){
        $category = Category::where('slug', $slug_cat)->with('restaurants.dishes')->first();

        //controllo errori
        $error = '';
        $success = true;

        if(!$category){
            $success = false;
            $error = 'Categoria non trovata';
        } elseif($category && count($category['restaurants']) === 0){
            $success = false;
            $error = 'Questa categoria non ha nessun ristorante';
        }

        return response()->json(compact('category', 'error', 'success'));
    }


}
