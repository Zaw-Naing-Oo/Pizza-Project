@extends('layouts.app')

@section("title") Pizza  @endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Pizza</div>

                    <form action="{{ route('pizza.update',$pizza->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('Put')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name Of Pizza</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $pizza->name }}">
                                @error('name')
                                <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description Of Pizza</label>
                                <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror" >{{ $pizza->description }}</textarea>
                                @error('description')
                                <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>
                            <label class="mt-2" for="">Pizza Price($)</label>
                            <div class="form-inline d-flex justify-content-around mb-2">
                                <input type="number" name="small_pizza_price" class="form-control @error('small_pizza_price') is-invalid @enderror" value="{{ $pizza->small_pizza_price }}" placeholder="small pizza price">


                                <input type="number" name="medium_pizza_price" class="form-control @error('medium_pizza_price') is-invalid @enderror" value="{{ $pizza->medium_pizza_price }}" placeholder="medium pizza price">


                                <input type="number" name="large_pizza_price" class="form-control @error('large_pizza_price') is-invalid @enderror" value="{{ $pizza->large_pizza_price }}" placeholder="large pizza price">

                            </div>
                            <div class="form-group">
                                <label for="description">Category</label>
                                <select class="custom-select custom-select-lg disabled @error('category')  is-invalid @enderror" id="" name="category">
                                    <option value="">Select Pizza Category</option>
                                    <option value="vegetarian">Vegetarian</option>
                                    <option value="nonvegetarian">Non vegetarian</option>
                                    <option value="traditional">Traditional</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Image</label>
                                <input type="file" name="image" class="form-control p-1 @error('image') is-invalid @enderror" value="{{ $pizza->image }}"   >
                                @error('image')
                                <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary btn-lg">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
