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
                        <li class="breadcrumb-item"><a href="/transaksi">Transaksi</a></li>
                        <li class="breadcrumb-item active">Detail Transaksi</li>
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
                                    <label>Jenis Kardus</label>
                                    <input type="text" class="form-control
                                        @error('jenis')
                                            is-invalid
                                        @enderror" value="{{ $jenis }}" name="jenis" id="jenis" readonly/>
                                </div>

                                <div class="form-group">
                                    <label>Ukuran Kardus</label>
                                    <input type="text" class="form-control
                                        @error('ukuran')
                                            is-invalid
                                        @enderror" value="{{ $ukuran }}" name="ukuran" id="ukuran" readonly/>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">                                
                                <div class="form-group">
                                    <label>Stock Kardus</label>
                                    <input type="text" class="form-control
                                        @error('stock')
                                            is-invalid
                                        @enderror" value="{{ $stock }}" name="stock" id="stock" readonly/>
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-success btn-block" data-toggle="modal" id='btn_tambah' data-target=".modal-tambah">
                                        <li class="fa fa-plus"></li>&nbsp; Tambah Stok
                                    </button>
                                    <form action="{{ route('transaksi.add.stock') }}" method="post" enctype="multipart/form-data">
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
                                                        <input type="text" class="form-control
                                                            @error('id')
                                                                is-invalid
                                                            @enderror" value="{{ $id }}" name="add_stock_id" id="add_stock_id" readonly hidden/>
                                                        <input type="number" class="form-control" name="jumlah" id="jumlah" />
                                                        <select name="status" id="status" hidden>
                                                            <option value="plus" >Plus</option>
                                                        </select>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary"><li class="fa fa-plus"></li>&nbsp; Tambah Stok</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-success btn-block" data-toggle="modal" id="btn_kurang" data-target=".modal-kurangi">
                                        <li class="fa fa-minus"></li>&nbsp; Kurangi Stok
                                    </button>
                                    <form action="{{ route('transaksi.add.subtract') }}" method="post" enctype="multipart/form-data">
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
                                        <div class="modal fade modal-kurangi" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">Transaksi Stok</h4>
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <label>Kurangi Stock kardus</label>
                                                        <input type="text" class="form-control
                                                            @error('id')
                                                                is-invalid
                                                            @enderror" value="{{ $id }}" name="subtract_stock_id" id="subtract_stock_id" readonly hidden/>
                                                        <input type="number" class="form-control" name="jumlah" id="jumlah" />
                                                        <select name="status" id="status" hidden>
                                                            <option value="minus" >minus</option>
                                                        </select>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary"> <li class="fa fa-minus"></li>&nbsp; Kurangi Stok</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
