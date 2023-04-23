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
                    <li class="breadcrumb-item active">Master Kardus</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">

                    <a class="btn btn-primary" href="{{url('kardus/create')}}"><li class="fa fa-plus"></li>&nbsp; Create Kardus</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Kardus</th>
                            <th>Jenis Kardus</th>
                            <th>Ukuran Kardus</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($dataMasterKardus as $key => $masterKardus)    
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $masterKardus->id }}</td>
                                    <td>{{ $masterKardus->jenis }}</td>
                                    <td>{{ $masterKardus->ukuran }}</td>
                                    <td>
                                        <a href="{{url("kardus/edit/$masterKardus->id")}}" class="btn btn-primary"><li class="fa fa-edit"></li>&nbsp; Edit</a>
                                        {{-- <form action="{{url("kardus/destroy/$masterKardus->id")}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-primary btn-block"><li class="fa fa-trash"></li>&nbsp;Delete</button>
                                        </form> --}}
                                        
                                        <a href="{{url("kardus/generate/$masterKardus->id")}}" class="btn btn-primary"><li class="fa fa-print"></li>&nbsp; Print QR</a>
                                    </td>
                                </tr>
                            @endforeach
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
