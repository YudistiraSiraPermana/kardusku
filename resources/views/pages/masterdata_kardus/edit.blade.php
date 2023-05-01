@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Kardus</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/kardus">Master Kardus</a></li>
                    <li class="breadcrumb-item active">Edit Kardus</li>
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
                <h3 class="card-title">Data Kardusku</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{ route('kardus.update') }}" method="post" enctype="multipart/form-data">
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
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control 
                                        @error('id')
                                            is-invalid
                                        @enderror" value="{{ $id }}" name="id" id="id" readonly hidden />
                                <label>Jenis Kardus</label>
                                <input type="text" class="form-control 
                                        @error('jenis')
                                            is-invalid
                                        @enderror" value="{{ $jenis }}" name="jenis" id="jenis" required />
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control 
                                        @error('created_by')
                                            is-invalid
                                        @enderror" value="{{ $created_by }}" name="created_by" id="created_by" readonly
                                    hidden />
                                <label>Ukuran kardus</label>
                                <input type="text" class="form-control
                                        @error('ukuran')
                                            is-invalid
                                        @enderror" value="{{ $ukuran }}" name="ukuran" id="ukuran" required />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">
                            <li class="fa fa-edit"></li>&nbsp; Edit Kardus
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection