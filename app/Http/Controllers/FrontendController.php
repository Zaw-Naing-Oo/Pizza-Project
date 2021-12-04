<?php

namespace App\Http\Controllers;

use App\Models\Frontend;
use App\Models\Pizza;
use App\Models\UserOrder;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        dd($request->category);
        if(!$request->category){
            $pizzas = Pizza::latest()->get();
            return view('frontpage',compact('pizzas'));
        }

        $pizzas = Pizza::where('category',$request->category)->get();
        return view('frontpage',compact('pizzas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->small_pizza < 0 || $request->medium_pizza < 0 || $request->large_pizza < 0){
            return back()->with('errorMessage','Order should not have negative number');
        }

        if ($request->small_pizza == 0 &&  $request->medium_pizza == 0 && $request->large_pizza == 0 ){
            return back()->with('errorMessage','Please order at least on pizza');
        }

        UserOrder::create([
            'time' => $request->time,
            'date' => $request->date,
            'body' => $request->body,
            'user_id' => auth()->user()->id,
            'pizza_id' => $request->pizza_id,
            'small_pizza' => $request->small_pizza,
            'medium_pizza' => $request->medium_pizza,
            'large_pizza' => $request->large_pizza,
        ]);
        return back()->with('message','Your order is Successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function show(Frontend $frontend,$id)
    {
        $pizza  = Pizza::find($id);
        return view('Detail',compact('pizza'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function edit(Frontend $frontend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Frontend $frontend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function destroy(Frontend $frontend)
    {
        //
    }
}
