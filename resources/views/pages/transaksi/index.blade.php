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
                                    <a type="button" class="btn btn-success btn-block" data-toggle="modal" data-target=".modal-tambah" >
                                        Tambah Stok
                                    </a>
                                    <div class="modal fade modal-tambah" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel">Transaksi Stok</h4>
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <label>Tambah Stock kardus</label>
                                                    <input type="number" class="form-control" name="tambah_stock" id="tambah_stock" />
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Tambah Stok</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a type="button" class="btn btn-success btn-block" data-toggle="modal" data-target=".modal-tambah" >
                                        Kurangi Stok
                                    </a>
                                    <div class="modal fade modal-tambah" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel">Transaksi Stok</h4>
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <label>Kuerangi Stock kardus</label>
                                                    <input type="number" class="form-control" name="kurangi_stock" id="kurangi_stock" />
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Kurangi Stok</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
@endsection
