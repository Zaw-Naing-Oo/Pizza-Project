<?php

namespace App\Http\Controllers;

use App\Http\Requests\PizzaStoreRequest;
use App\Http\Requests\PizzaUpdateRequest;
use App\Models\Pizza;
use Illuminate\Http\Request;

class   PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pizzas = Pizza::latest()->paginate(4);
       return view('pizza.index',compact('pizzas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pizza.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PizzaStoreRequest $request)
    {
        $pizza = new Pizza();
        $path = $request->image->store('public/pizza');
        $pizza->name = $request->name;
        $pizza->description = $request->description;
        $pizza->small_pizza_price = $request->small_pizza_price;
        $pizza->medium_pizza_price = $request->medium_pizza_price;
        $pizza->large_pizza_price = $request->large_pizza_price;
        $pizza->category = $request->category;
        $pizza->image = $path;
        $pizza->save();

        return  redirect()->route('pizza.index')->with('message','Pizza is successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function show(Pizza $pizza)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function edit(Pizza $pizza)
    {
        return view('pizza.edit',compact('pizza'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function update(PizzaUpdateRequest $request, Pizza $pizza)
    {
        $pizza->name = $request->name;
        $pizza->description = $request->description;
        $pizza->small_pizza_price = $request->small_pizza_price;
        $pizza->medium_pizza_price = $request->medium_pizza_price;
        $pizza->large_pizza_price = $request->large_pizza_price;
        $pizza->category = $request->category;
        $path = $request->image->store('public/pizza');
        $pizza->image = $path;
        $pizza->update();
        return  redirect()->route('pizza.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pizza $pizza,)
    {
            $pizza->delete();
            return redirect()->route('pizza.index')->with('message', 'Pizza is successfully deleted');
    }
}
