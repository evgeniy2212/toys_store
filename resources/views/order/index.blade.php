@extends('layouts.app')

@section('content')
<div class="container">
    @include('navigation')
    <div class="row">
        <h1>Orders</h1>
    </div>
    <div class="row">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>id</th>
                <th>status</th>
                <th>order list</th>
                <th>articuls</th>
                <th>quantity</th>
                <th>price list</th>
                <th>amount</th>
                <th>adress</th>
                <th>name</th>
                <th>number</th>
                <th>delivery</th>
                <th>city</th>
                <th>created</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $orders as $order)
                <tr @if($order->status)
                        class="success"
                    @else
                        class="danger"
                    @endif>
                    <td>{{ $order->id }}</td>
                    <td>
                        @if($order->status)
                            Подтвержден
                        @else
                            <a class="btn btn-success" href="{{ route('confirmOrder', $order->id) }}">Подвердить</a>
                        @endif
                    </td>
                    <td>
                        @foreach($order->order_list as $item)
                            {{ $item }}<br>
                        @endforeach
                    </td>
                    <td>
                        @foreach($order->articuls as $item)
                            {{ $item }}<br>
                        @endforeach
                    </td>
                    <td>
                        @foreach($order->order_quantity as $item)
                            {{ $item }}<br>
                        @endforeach
                    </td>
                    <td>
                        @foreach($order->price_list as $item)
                            {{ $item }}<br>
                        @endforeach
                    </td>
                    <td>{{ $order->amount }}</td>
                    <td>{{ $order->adress }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->number }}</td>
                    <td>{{ $order->delivery_method }}</td>
                    <td>{{ $order->city }}</td>
                    <td>{{ $order->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
