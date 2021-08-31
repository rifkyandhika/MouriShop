@extends('admin.layouts.master')

@section('page')
    Detail order
@endsection


@section('content')

    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Detail Order</h4>
                    <p class="category">Detail Order</p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tanggal</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->date }}</td>
                                <td>{{ $order->address }}</td>
                                <td>
                                    @if ($order->status)
                                        <span class="label label-success">Confirmed</span>
                                    @else
                                        <span class="label label-warning">Pending</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($order->status)
                                    {{ link_to_route('order.pending','Pending', $order->id, ['class'=>'btn btn-warning btn-sm']) }}
                                @else
                                    {{ link_to_route('order.confirm','Confirm', $order->id, ['class'=>'btn btn-success btn-sm']) }}
                                @endif  </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="header">
                    <h4 class="title">Detail User</h4>
                    <p class="category">Detail User</p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <td>{{ $order->user->id }}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>{{ $order->user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $order->user->email }}</td>
                        </tr>
                        <tr>
                            <th>Register pada</th>
                            <td>{{ $order->user->created_at->diffForHumans() }}</td>
                        </tr>

                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Detail  Produk</h4>
                    <p class="category">Detail Produk</p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <tr>
                            <th>ID Order</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Quantity</th>
                            <th>Gambar</th>
                        </tr>
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>
                                @foreach ($order->products as $product)
                                    <table class="table">
                                        <tr>
                                            <td>{{ $product->name }}</td>
                                        </tr>
                                    </table>
                                @endforeach
                            </td>

                            <td>
                                @foreach ($order->orderItems as $item)
                                    <table class="table">
                                        <tr>
                                            <td>{{ $item->price }}</td>
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
                                @foreach ($order->products as $product)
                                    <table class="table">
                                        <tr>
                                            <td><img src="{{ url('uploads') . '/' . $product->image }}" alt="" style="width: 2em"></td>
                                        </tr>
                                    </table>
                                @endforeach
                            </td>
                        </tr>

                    </table>

                </div>
            </div>
        </div>
    </div>

    <a href="{{ url('/admin/orders') }}" class="btn btn-success">Kembali ke Order</a>
    
@endsection