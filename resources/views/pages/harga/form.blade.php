<!-- Content Wrapper. Contains page content -->
@extends('adminlte.layouts.app')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">@if($data)         
            Edit
          @else
            Create
          @endif Jenis Sampah</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/jenis">Jenis Sampah</a></li>
            <li class="breadcrumb-item active">@if($data)         
              Edit
            @else
              Create
            @endif Jenis Sampah</li>
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

            <div class="card card-primary">
              <div class="card-header">
              <h3 class="card-title">Form 
                @if($data)         
                  Edit
                @else
                  Create
                @endif 
                Nasabah</h3>
              </div>
              
              <form class="form-horizontal" action="{{ (request()->is('bank/jenis/create')) ? url('bank/jenis/store') : url('bank/jenis/update', $data->id) }}" method="POST" enctype="multipart/form-data" >
                @csrf
                @if($data)         
                  @method('PUT')
                @else
                  @method('POST') 
                @endif
                <div class="card-body">
                  <div class="form-group">
                    <label class="font-weight-bold">Jenis / Type</label>
                    <input type="text" class="form-control @error('type_sampah') is-invalid @enderror" name="type_sampah" value="{{  old('type_sampah', ($data) ? $data->type_sampah : '')  }}" placeholder="Masukkan Jenis / Type Sampah">
                    @error('type_sampah')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                  </div>
                </div>
                
                <div class="card-footer">
                  <button type="submit" class="btn btn-md btn-primary">
                    @if($data)         
                      UBAH
                    @else
                      SIMPAN
                    @endif
                  </button>
                  <button type="reset" class="btn btn-md btn-warning">RESET</button>
                  <a type="button" href="/bank/jenis" class="btn btn-default float-right">KEMBALI</a>
                </div>
              
              </form>
            </div>
          
        </div>
      </div>
      
    </div><!--/. container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection