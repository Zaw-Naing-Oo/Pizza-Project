@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-2 col-12">
                <div class="card">
                    <div class="card-header">Menu</div>
                    <div class="card-body">
                        <ul class="list-group">
                            <a href="{{ route('pizza.index') }}" class="list-group-item list-group-item-action">View</a>
                            <a href="{{ route('pizza.create') }}" class="list-group-item list-group-item-action">Create</a>
                            <a href="{{ route('order.index') }}" class="list-group-item list-group-item-action">Order</a>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-10 col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <span class="font-weight-bold">All Pizza</span>
                        <a href="{{ route('pizza.create') }}" class="btn btn-primary btn-sm">Create Pizza</a>
                    </div>
                    <div class="card-body">
                        @if(session('message'))
                            <p class="alert alert-success">{{ session('message') }}</p>
                        @endif
                        <table class="table table-hover table-bordered">
                            <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Small Price($)</th>
                            <th>Medium Price($)</th>
                            <th>Large Price($)</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Control</th>
                            </thead>

                            <tbody>
                            @foreach($pizzas as $pizza)
                                <tr>
                                    <td>{{ $pizza->id }}</td>
                                    <td>{{ $pizza->name }}</td>
                                    <td>{{ $pizza->description }}</td>
                                    <td>{{ $pizza->small_pizza_price }}</td>
                                    <td>{{ $pizza->medium_pizza_price }}</td>
                                    <td>{{ $pizza->large_pizza_price }}</td>
                                    <td>{{ $pizza->category }}</td>
                                    <td><img src="{{ Storage::url($pizza->image) }}" width="70"></td>
                                    <td class="text-nowrap">
                                        <a href="{{ route('pizza.edit',$pizza->id) }}">
                                            <button class="btn btn-outline-primary btn-sm">Edit</button>
                                        </a>
                                        <form action="{{ route('pizza.destroy',$pizza->id) }}" class="d-inline-block" method="post">
                                            @csrf
                                            @method('Delete')
                                            <button class="btn btn-outline-danger btn-sm" onclick="confirm('Are U sure to Delete')">Delete</button>
                                            <!-- Modal -->
                                        </form>
                                    </td>


                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{ $pizzas->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--    {{ $pizzas->links() }}--}}
@endsection

{{--@if (session('message'))--}}
{{--    <div class="alert alert-success" role="alert">--}}
{{--        {{ session('message') }}--}}
{{--    </div>--}}
{{--@endif--}}

@section('head')
    <style>
        table th,td{
            vertical-align: middle !important;
        }
    </style>
@endsection

