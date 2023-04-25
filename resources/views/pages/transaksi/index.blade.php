@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Transaksi Kardus</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Transaksi</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="row">
        <div class="container-fluid">

            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Scan Kardusku</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>

                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <center>
                                    <button type="button" id="scan-button" class="btn btn-primary"><li class="fa fa-qrcode"></li>&nbsp; Scan QR Code</button><br>
                                    <video id="preview" class="#preview pt-3"></video>
                                </center>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                
                                <form action="{{ route('transaksi.process')}}" enctype="multipart/form-data">
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
                                    <label>ID Kardus</label>
                                    <input type="text" class="form-control" name="id" id="id" readonly required/>
                                    <br>
                                    <button type="submit" class="btn btn-primary btn-block">
                                        <li class="fa fa-check"></li>&nbsp; Transaksi Kardus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
