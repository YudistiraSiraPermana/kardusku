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
                    <li class="breadcrumb-item active">History Transaksi Kardus</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-head">
                    <div class="col-md-12 col-sm-12">
                        <form method="POST" action="{{ route('transaksi.filter') }}">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>
                                                {{ $error }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @csrf
                            <div class="row pt-4">
                                <div class="col-sm-1">
                                    <label for="start_date">Start Date :</label>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input id="start_date" name="start_date" class="date-picker form-control"
                                            placeholder="dd-mm-yyyy" type="text" required onfocus="this.type='date'"
                                            onmouseover="this.type='date'" onclick="this.type='date'"
                                            onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                        <script>
                                            function timeFunctionLong(input) {
                                                setTimeout(function() {
                                                    input.type = 'text';
                                                }, 60000);
                                            }
                                        </script>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <label for="end_date">End Date :</label>
                                </div>
                                <div class="col-sm-4">
                                    <div class="item form-group">
                                        <input id="end_date" name="end_date" class="date-picker form-control"
                                            placeholder="dd-mm-yyyy" type="text" required onfocus="this.type='date'"
                                            onmouseover="this.type='date'" onclick="this.type='date'"
                                            onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                        <script>
                                            function timeFunctionLong(input) {
                                                setTimeout(function() {
                                                    input.type = 'text';
                                                }, 60000);
                                            }
                                        </script>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-primary" id="submit-btn">
                                        <span class="spinner-border spinner-border-sm d-none" role="status"
                                            aria-hidden="true"></span>
                                        <li class="fa fa-filter"></li>&nbsp; Filter
                                    </button>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                    
                </div>
                <hr>
                <!-- /.card-header -->
                <div class="card-body col-md-12 col-sm-12">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
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
                            @foreach($data as $transaksi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
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
                                <td colspan="8" style="text-align:right"><strong>Jumlah</strong></td>
                                <td><strong>{{ $total_kardus }}</strong></td>
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
