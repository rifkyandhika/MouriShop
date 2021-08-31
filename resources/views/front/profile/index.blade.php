@extends('front.layouts.master')

@section('content')

    <h2>Profile</h2>
    <hr>

    <h3>Detail User</h3>

    <table class="table table-bordered">
        <thead>
        </thead>
        <tr>
            <th>ID</th>
            <td>{{ $user->id }}</td>
        </tr>
        <tr>
            <th>Nama</th>
            <td>{{ $user->name}}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th>Register pada</th>
            <td>{{ $user->created_at}}</td>
        </tr>
    </table>

@if (session()->has('msg'))
<div class="alert alert-success">
    {{ session()->get('msg') }}
</div>
@endif

    <h4 class="title">Orders</h4>
    <hr>
    <div class="content table-responsive table-full-width">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Produk</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                @foreach ($user->order as $order)
                    <td>{{ $order->id }}</td>
                    <td>
                        @foreach ($order->products as $item)
                            <table class="table">
                                <tr>
                                    <td>{{ $item->name }}</td>
                                </tr>
                            </table>
                        @endforeach
                    </td>

                    <td>
                        @foreach ($order->orderItems as $item)
                            <table class="table">
                                <tr>
                                    <td>{{ $item->quantity }}</td>
                                </tr>
                            </table>
                        @endforeach
                    </td>

                    <td>
                        @foreach ($order->orderItems as $item)
                        @php
                        $hasil_rupiah = "Rp " . number_format($item->price,2,',','.');
                        @endphp
                            <table class="table">
                                <tr>
                                    <td>{{ $hasil_rupiah }}</td>
                                </tr>
                            </table>
                        @endforeach
                    </td>

                    <td>
                        @if ($order->status)
                            <span class="badge badge-success">Confirmed</span>
                        @else
                            <span class="badge badge-warning">Pending</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ url('/user/order') . '/' . $order->id }}" class="btn btn-outline-dark btn-sm">Details</a>
                    </td>
            </tr>
            @endforeach


            </tbody>
        </table>

    </div>

@endsection