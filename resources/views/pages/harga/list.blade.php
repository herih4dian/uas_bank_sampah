<!-- Content Wrapper. Contains page content -->
@extends('adminlte.layouts.app')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">List Harga Sampah</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">List Harga Sampah</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Harga Sampah</h3>
                <a href="/bank/harga/create" class="text-decoration-none">
                  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-primary" type="button">Tambah Data</button>
                  </div>
                </a>
            </div>
            <!-- /.card-header -->

            
            <div class="card-body">
              <table id="semua_tabel" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Jenis / Type Sampah</th>
                  <th>Harga</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @forelse ($datas as $val)
                          <tr>
                              <td>{{ $val->jenis_sampah->type_sampah ?? '-' }}</td>
                              <td>{{ $val->harga_sampah }} /{{ $val->satuan->satuan ?? '-' }}</td>
                              <th><a href="{{ url('bank/harga/edit/'.$val->id) }}"><i class="fas fa-edit"></i></th>
                          </tr>
                  @empty
                      <tr>
                          <td colspan="3">No Data</td>
                      </tr>
                  @endforelse
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!--/. container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection