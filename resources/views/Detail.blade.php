@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 col-12">
                <div class="card">
                    <div class="card-header">Menu</div>

                    <div class="card-body">
                       @if(Auth::Check())
                            <form action="{{ route('frontpage.store',$pizza->id) }}">
                                <div class="form-group">
                                    @if(session('message'))
                                        <p class="py-3 alert alert-success">
                                            {{ session('message') }}
                                        </p>
                                    @endif
                                        @if(session('errorMessage'))
                                            <p class="py-3 alert alert-danger">
                                                {{ session('errorMessage') }}
                                            </p>
                                        @endif
                                    <p><span>Name : </span> {{ auth()->user()->name }}</p>
                                    <p><span>Email : </span> {{ auth()->user()->email }}</p>
                                    <p><span>S.Pizza order </span><input class="form-control" type="number" value="0" name="small_pizza"></p>
                                    <p><span>M.Pizza order </span><input class="form-control" type="number" value="0" name="medium_pizza"></p>
                                    <p><span>L.Pizza order </span><input class="form-control" type="number" value="0" name="large_pizza"></p>
                                    <p><input type="hidden" name="pizza_id" value="{{ $pizza->id }}"></p>
                                    <p><input type="date" name="date" class="form-control" required></p>
                                    <p><input type="time" name="time" class="form-control" required></p>
                                    <p><textarea name="body" id="" class="form-control" required></textarea></p>

                                </div>
                                <button type="submit" class="btn btn-primary">Order Now</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}">
                                <button class="btn btn-primary">Please Login</button>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-12">
                <div class="card">
                    <div class="card-header">Pizza</div>

                    <div class="card-body text-center">
                        <div class="p-2 my-2">
                            <img src="{{ Storage::url($pizza->image)  }}" class="img-thumbnail" style="width: 70%" alt="">
                            <p class="mt-3">{{ $pizza->name }}</p>
                            <p>{{ $pizza->description }}</p>
                            <p><span>small_pizza_price</span>  - {{ $pizza->small_pizza_price }}$</p>
                            <p><span>medium_pizza_price</span>  - {{ $pizza->medium_pizza_price }}$</p>
                            <p><span>large_pizza_price</span>  - {{ $pizza->large_pizza_price }}$</p>
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

        button{
            background-color: #ba3e3e !important;
            border-color: #ba3e3e !important;
        }

    </style>
@endsection
