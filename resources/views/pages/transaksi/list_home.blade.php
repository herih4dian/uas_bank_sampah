<!-- Content Wrapper. Contains page content -->
@extends('adminlte.layouts.app')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">List Transaksi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">List Transaksi</li>
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
              <h3 class="card-title">Data Transaksi Bank Sampah</h3>
            </div>
            <!-- /.card-header -->

            
            <div class="card-body">
              <table id="tabel_home" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Tanggal Transaksi</th>
                  <th>Nama Nasabah</th>
                  <th>Jenis Sampah</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                  @forelse ($datas as $val)
                          <tr>
                              <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $val->tanggal_transaksi)->format('d/m/Y') }}</td>
                              <td>{{ $val->nasabah->nama ?? '-' }}</td>
                              <td><span class="badge bg-secondary">{{ $val->jenis_sampah->type_sampah ?? '-' }}</span></td>
                              <td>{{ $val->satuans }} /{{ $val->satuan->satuan }}</td>
                          </tr>
                  @empty
                      <tr>
                          <td colspan="5">No Data</td>
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