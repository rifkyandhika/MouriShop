@extends('admin.layouts.master')

@section('page')
    Order
@endsection

@section('content')
    <div class="row">

        <div class="col-md-12">

            @include('admin.layouts.message')

            <div class="card">
                <div class="header">
                    <h4 class="title">Order</h4>
                    <p class="category">List semua order</p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Produk</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Pembayaran</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            @foreach ($orders as $order)
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user->name }}</td>
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
                                    @if ($order->status == 'Confirmed')
                                    <span class="label label-info">Confirmed</span>
                                    @elseif ($order->status == 'Pending')
                                    <span class="label label-warning">Pending</span>
                                    @elseif ($order->status == 'Verifying')
                                    <span class="label label-warning">Verifying</span>
                                    @else 
                                    <span class="label label-success">Processed</span>
                                    @endif
                                </td>
                            @if($order->payment == NULL)
                            <td>Belum Ada Pembayaran</td>
                            @else
                            <td><a href="{{asset('uploads')}}/{{$order->payment}}" target="_blank">Lihat</td>
                            @endif
                            <td>

                                @if ($order->status == 'Confirmed')
                                    {{ link_to_route('order.pending','Pending', $order->id, ['class'=>'btn btn-success btn-sm']) }}
                                @elseif ($order->status == 'Verifying')
                                    {{ link_to_route('order.process','Proceed', $order->id, ['class'=>'btn btn-success btn-sm']) }}
                                @elseif ($order->status == 'Pending')
                                    {{ link_to_route('order.confirm','Confirm', $order->id, ['class'=>'btn btn-info btn-sm']) }}
                                @else
                                @endif

                                {{ link_to_route('orders.show','Details', $order->id, ['class'=>'btn btn-default btn-sm']) }}

                            </td>
                        </tr>
                        @endforeach



                        </tbody>
                    </table>

                </div>
            </div>
        </div>


    </div>
@endsection