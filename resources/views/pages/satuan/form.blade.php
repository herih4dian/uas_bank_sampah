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
          @endif Satuan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/satuan">Satuan</a></li>
            <li class="breadcrumb-item active">@if($data)         
              Edit
            @else
              Create
            @endif Satuan</li>
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
              <form action="{{ (request()->is('satuan/create')) ? url('satuan/store') : url('satuan/update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if($data)         
                  @method('PUT')
                @else
                  @method('POST') 
                @endif
                
                <div class="form-group">
                    <label class="font-weight-bold">Satuan</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="satuan" value="{{  old('satuan', ($data) ? $data->satuan : '')  }}" placeholder="Satuan">
                
                    <!-- error message untuk title -->
                    @error('satuan')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-md btn-primary">@if($data)         
                  UBAH
                @else
                  SIMPAN
                @endif</button>
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