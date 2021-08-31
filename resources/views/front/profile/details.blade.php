@extends('front.layouts.master')

@section('content')
<h2 class="mt-5">Detail order user</h2>
<hr>


<div class="row">

    <div class="col-md-12">
        <h4 class="title"></h4>
        <div class="content table-responsive table-full-width">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th colspan="7">Detail Order</th>
                    </tr>
                    <tr>
                        <th>ID</th>
                        <th>Tanggal</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->date }}</td>
                        <td>{{ $order->address }}</td>
                        <td>
                            @if ($order->status == 'Confirmed')
                            <span class="badge badge-info">Confirmed</span>
                            @elseif ($order->status == 'Pending')
                            <span class="badge badge-warning">Pending</span>
                            @elseif ($order->status == 'Verifying')
                            <span class="badge badge-secondary">Verifying</span>
                            @else
                            <span class="badge badge-success">Processed</span>
                            @endif
                        </td>
                        @if($order->status == 'Pending')
                        <td>
                            Sedang menunggu konfirmasi dari Admin
                        </td>
                        @elseif($order->status == 'Confirmed')
                        <td>
                            <button type="button" class="mb-2 btn btn-sm btn-primary" data-toggle="modal" data-target="#uploadModal">
                                Upload
                            </button>
                        </td>
                        @elseif($order->status == 'Verifying')
                        <td>
                            Sedang menunggu konfirmasi pembayaran dari Admin
                        </td>
                        @else
                        <td><a href="{{asset('uploads')}}/{{ $order->payment }}" target="_blank">Lihat</td>
                        @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-4">

        <h4 class="title">Detail User</h4>
        <hr>
        <div class="content table-responsive table-full-width">
            <table class="table table-bordered table-striped">
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
    <div class="col-md-8">

        <h4 class="title">Detail Produk</h4>
        <hr>
        <div class="content table-responsive table-full-width">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>ID Pesanan</th>
                    <th>Nama Produk</th>
                    <th>Total Harga</th>
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
                                <td><img src="{{ url('uploads') . '/' . $product->image }}" alt="" style="width: 2em">
                                </td>
                            </tr>
                        </table>
                        @endforeach
                    </td>
                </tr>

            </table>

        </div>
    </div>
</div>
<!-- Modal -->
<div id="uploadModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <!-- Form -->
                <form method="POST" action="{{url('/user/order/verify')}}/{{$order->id}}" enctype="multipart/form-data">
                    {{ csrf_field()}}
                    Select file : <input type='file' name='payment' id='file' class='form-control'><br><br>
                    <button type="submit" class="btn btn-rounded btn-success"
                        style="position:fixed; bottom:20px; right:20px; z-index:1;">Upload
                    </button>
                </form>

                <!-- Preview-->
                <div id='preview'></div>
            </div>

        </div>

    </div>
</div>
@endsection