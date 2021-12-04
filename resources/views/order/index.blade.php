@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12 col-12">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('pizza.index') }}">View</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Orders</li>
                    </ol>
                </nav>
                <div class="card">
                    <div class="card-header">Orders</div>

                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>User</th>
                                <th>Phone/Email</th>
                                <th>Date/Time</th>
                                <th>Pizza</th>
                                <th>S.Pizza</th>
                                <th>M.Pizza</th>
                                <th>L.Pizza</th>
                                <th>Total</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Accept</th>
                                <th>Reject</th>
                                <th>Complete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td class="text-nowrap">{{ $order->user->name }}</td>
                                <td>{{ $order->user->email }}</td>
                                <td>
                                    {{ $order->date }}<br>
                                    {{ $order->time }}
                                </td>
                                <td>{{ $order->pizza->name }}</td>
                                <td>{{ $order->small_pizza }}</td>
                                <td>{{ $order->medium_pizza }}</td>
                                <td>{{ $order->large_pizza }}</td>
                                <td>
                                    ${{ ($order->pizza->small_pizza_price * $order->small_pizza) + ($order->pizza->medium_pizza_price * $order->medium_pizza) + ($order->pizza->large_pizza_price * $order->large_pizza)   }}
                                </td>
                                <td>{{ $order->body }}</td>
                                <td>{{ $order->status }}</td>
                                <form action="{{ route('order.status',$order->id) }}" method="post">
                                    @csrf
                                    <td class="text-nowrap">
                                            <input name="status" type="submit" value="accepted" class="btn btn-outline-primary btn-sm">
                                    </td>
                                    <td>
                                        <input name="status" type="submit" value="rejected" class="btn btn-outline-danger btn-sm">
                                    </td>
                                    <td>
                                        <input name="status" type="submit" value="completed" class="btn btn-outline-success btn-sm">
                                    </td>
                                </form>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
