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
                        <li class="breadcrumb-item"><a href="transaksi">Transaksi</a></li>
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
                    <form  enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <center>
                                        <button type="button" id="scan-button" class="btn btn-primary"><li class="fa fa-qrcode"></li>&nbsp; Scan QR Code</button><br>
                                        <video id="preview" class="#preview pt-3"></video>
                                    </center>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>ID Kardus</label>
                                    <input type="text" class="form-control" name="qr-code-id" id="qr-code-id" readonly/>
                                </div>

                                <div class="form-group">
                                    <label>Jenis Kardus</label>
                                    <input type="text" class="form-control" name="qr-code-jenis" id="qr-code-jenis" readonly/>
                                </div>

                                <div class="form-group">
                                    <label>Ukuran</label>
                                    <input type="text" class="form-control" name="qr-code-ukuran" id="qr-code-ukuran" readonly/>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="container-fluid">

            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Transaksi Kardusku</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>

                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form  enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Stock Kardus</label>
                                    <input type="text" class="form-control" name="qr-code-stock" id="qr-code-stock" readonly/>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Tambah Stock Kardus</label>
                                    <input type="text" class="form-control" name="nomor_rekening" id="nomor_rekening"/>
                                </div>

                                <div class="form-group">
                                    <label>Kurangi Stock kardus</label>
                                    <input type="text" class="form-control" name="nama_pemilik" id="nama_pemilik" />
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update Stock kardus</button>
                            </div>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>

    
@endsection
