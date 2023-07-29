<!-- Content Wrapper. Contains page content -->
@extends('adminlte.layouts.app')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit / Create Nasabah</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Create / Edit Nasabah</li>
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
        <div class="col-md-6">
          <div class="card border-0 shadow-sm rounded">
            <div class="card-body">
              <form action="{{ (request()->is('nasabah/create')) ? url('nasabah/store') : url('nasabah/update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if($data)         
                  @method('PUT')
                @else
                  @method('POST') 
                @endif
                
                <div class="form-group">
                    <label class="font-weight-bold">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{  old('nama', ($data) ? $data->nama : '')  }}" placeholder="Masukkan Nama">
                
                    <!-- error message untuk title -->
                    @error('nama')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
        
                <div class="form-group">
                    <label class="font-weight-bold">Alamat</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="5" placeholder="Masukkan Alamat">{{ old('alamat', ($data) ? $data->alamat : '') }}</textarea>
                
                    <!-- error message untuk content -->
                    @error('alamat')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                <button type="reset" class="btn btn-md btn-warning">RESET</button>
        
              </form> 
            </div>
          </div>
        </div>
      </div>
      
    </div><!--/. container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection