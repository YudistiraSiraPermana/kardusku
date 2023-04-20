@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Master Data Kardus</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Daftar Kardus</a></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">

                    <a class="btn btn-primary" href="{{url('kardus/create')}}">Create Kardus</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID Kardus</th>
                            <th>Jenis Kardus</th>
                            <th>Ukuran Kardus</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>None</td>
                                <td>None</td>
                                <td>None</td>
                                <td>
                                    <a href="{{url('kardus/edit')}}" class="btn btn-primary">Edit</a>
                                    <a href="" class="btn btn-primary">Delete</a>
                                    <a href="" class="btn btn-primary">Print QR</a>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
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
