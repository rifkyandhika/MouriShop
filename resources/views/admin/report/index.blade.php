@extends('admin.layouts.master')

@section('page')
Orders
@endsection

@section('content')
<div class="row">

    <div class="col-md-12">

        @include('admin.layouts.message')

        <div class="card">
            <div class="header">
                <h4 class="title">Report</h4>
                <p class="category">Income Report Detail</p>
            </div>
            <div class="card-body">
                <form method="get" action="{{url('admin/report')}}">
                    <!-- Input groups with icon -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-control border-input">

                                    <select class="form-control" id="exampleFormControlSelect1"
                                        placeholder="Pilih Bulan" name="bulan">
                                        <option selected disabled>Pilih Bulan</option>
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-control border-input">
                                    <select name="tahun" class="form-control">
                                        <option value="">Pilih Tahun</option>
                                        @for ($i = 2017; $i <= date("Y"); $i++) <option value="{{$i}}">
                                            {{$i}}</option>
                                            @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info btn-addon m-b-sm float-right">
                        <i class="fa fa-search" aria-hidden="true"></i> Cari
                    </button>
                    <br>
                    <br>
                </form>
                @if($bulan != NULL && $tahun != NULL)
                @php
                $nama_bulan = '';
                if($bulan == '01') {
                $nama_bulan = 'Januari';
                } elseif($bulan == '02') {
                $nama_bulan = 'Februari';
                } elseif($bulan == '03') {
                $nama_bulan = 'Maret';
                } elseif($bulan == '04') {
                $nama_bulan = 'April';
                } elseif($bulan == '05') {
                $nama_bulan = 'Mei';
                } elseif($bulan == '06') {
                $nama_bulan = 'Juni';
                } elseif($bulan == '07') {
                $nama_bulan = 'Juli';
                } elseif($bulan == '08') {
                $nama_bulan = 'Agustus';
                } elseif($bulan == '09') {
                $nama_bulan = 'September';
                } elseif($bulan == '10') {
                $nama_bulan = 'Oktober';
                } elseif($bulan == '11') {
                $nama_bulan = 'November';
                } elseif($bulan == '12') {
                $nama_bulan = 'Desember';
                }else{}
                @endphp
                <button class="btn btn-warning btn-addon m-b-sm float-right" onclick="printDiv('printable')">
                    <i class="fa fa-print" aria-hidden="true"></i> Print
                </button>
                <div id="printable">
                    <h3>Laporan Jumlah Pendapatan {{$nama_bulan}} tahun {{$tahun}}</h3>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th>No.</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Transaction Date</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($hasil as $i => $item)
                                @php
                                $total = number_format($item->price,2,',','.');
                                $grand_total = number_format($jumlah,2,',','.');
                                @endphp
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td>{{$item->tanggal}}</td>
                                    <td>Rp. {{$total}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tr class="table-success">
                                <th>Total</th>
                                <th>Rp. {{$grand_total}}</th>
                            </tr>
                        </table>
                    </div>
                </div>
                @else
                @endif
            </div>
        </div>
        @endsection