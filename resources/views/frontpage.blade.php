@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 col-12">
                <div class="card">
                    <div class="card-header">Menu</div>

                    <div class="card-body">
                        <form action="" method="get">
                            <button type="submit" value="vegetarian" name="category" class="btn btn-outline-primary w-100 my-2">Vegetarian</button>
                            <button type="submit" value="nonvegetarian" name="category" class="btn btn-outline-primary w-100 my-2">Non Vegetarian</button>
                            <button type="submit" value="traditional" name="category" class="btn btn-outline-primary w-100 my-2">Traditional</button>
                            <a href="{{ route('pizza.index') }}">
                                <button class="btn btn-outline-primary w-100 my-2">All  Pizzas</button>
                            </a>
                        </form>
                    </div>
                </div>

                @if(Auth::Check())
                    @if(auth()->user()->is_admin == 1)
                        <div class="mt-3">
                            <a href="{{ route('pizza.index') }}">
                                <button class="btn btn-outline-primary">List of Pizzas</button>
                            </a>
                        </div>
                     @endif
                    @endif

            </div>
            <div class="col-md-8 col-12">
                <div class="card">
                    <div class="card-header">Pizza</div>

                    <div class="card-body text-center">
                          <div class="row">
                              @forelse($pizzas as $pizza)
                                  <div class="col-12 col-md-4 mt-2 border rounded">
                                      <div class="p-2 my-2">
                                          <img src="{{ Storage::url($pizza->image)  }}" class="img-thumbnail" style="width: 70%" alt="">
                                          <p class="mt-1">{{ $pizza->name }}</p>
                                          <p>{{ $pizza->description }}</p>
                                          <a href="{{ route('frontpage.show',$pizza->id) }}">
                                              <button class="btn btn-outline-primary mb-1">Show Detail</button>
                                          </a>
                                      </div>
                                  </div>
                              @empty
                                  'There is no pizza'

                              @endforelse
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('head')
    <style>
     .card-header{
         background-color: #ba3e3e;
         color: whitesmoke;
         font-weight: bold;
         font-size: 20px;
         text-align: center;
     }
     .list-group-item{
         font-size: 18px;
         font-weight: bold;
     }
    </style>
    @endsection
