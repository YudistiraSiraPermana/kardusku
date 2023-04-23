@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">History Transaksi Kardus</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">History Transaksi Kardus</a></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
    <div class="row">
        <div class="col-12">

            <div class="card">
               
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID Kardus</th>
                            <th>ID User</th>
                            <th>Nama</th>
                            <th>Tanggal Transaksi</th>
                            <th>Jenis Kardus</th>
                            <th>Ukuran Kardus</th>
                            <th>Status</th>
                            <th>Jumlah Transaksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($dataTransaksi as $transaksi)
                                <tr>
                                    <td>{{ $transaksi->master_kardus_id }}</td>
                                    <td>{{ $transaksi->created_by }}</td>
                                    <td>{{ $transaksi->user->name }}</td>
                                    <td>{{ $transaksi->created_at }}</td>
                                    <td>{{ $transaksi->master_kardus->jenis }}</td>
                                    <td>{{ $transaksi->master_kardus->ukuran }}</td>
                                    <td>{{ $transaksi->status }}</td>
                                    <td>{{ $transaksi->jumlah }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7" style="text-align:right">Jumlah</td>
                                <td>None</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection
