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
          @endif Harga Sampah</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/bank/harga">Harga Sampah</a></li>
            <li class="breadcrumb-item active">@if($data)         
              Edit
            @else
              Create
            @endif Harga Sampah</li>
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
                Harga Sampah</h3>
              </div>
              
              <form class="form-horizontal" action="{{ (request()->is('bank/harga/create')) ? url('bank/harga/store') : url('bank/harga/update', $data->id) }}" method="POST" enctype="multipart/form-data" >
                @csrf
                @if($data)     
                 {{-- {{ var_dump($data) }}     --}}
                  @method('PUT')
                @else
                  @method('POST') 
                @endif
                <div class="card-body">
                  <div class="form-group">
                    <label class="font-weight-bold">Jenis / Type</label>
                    <select class="form-control rounded-0 custom-select @error('id_master_jenis_sampah') is-invalid @enderror" name="id_master_jenis_sampah">
                      <option value="" selected>-</option>
                      @forelse ($j_sampah as $val)
                        <option value="{{ $val->id }}" {{ ($data) ? (($val->id == $data->id_master_jenis_sampah ) ? 'selected' : '') : '' }}>{{ $val->type_sampah }}</option>
                      @empty
                        <tr>
                          <option value="">No Data</option>
                        </tr>
                      @endforelse
                    </select>
                    {{-- <input type="text" class="form-control @error('id_master_jenis_sampah') is-invalid @enderror" name="id_master_jenis_sampah" value="{{  old('id_master_jenis_sampah', ($data) ? $data->id_master_jenis_sampah : '')  }}" placeholder="Masukkan Jenis / Type Sampah"> --}}
                    @error('id_master_jenis_sampah')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                  </div>

                  <div class="row">
                    <div class="col-sm-8">
                      <div class="form-group">
                        <label class="font-weight-bold">Harga Sampah</label>
                        <input type="text" class="form-control @error('harga_sampah') is-invalid @enderror" name="harga_sampah" value="{{  old('harga_sampah', ($data) ? $data->harga_sampah : '')  }}" placeholder="Masukkan Harga Sampah">
                        @error('harga_sampah')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label class="font-weight-bold">Satuan</label>
                        <select class="form-control rounded-0 custom-select @error('id_master_satuan') is-invalid @enderror" name="id_master_satuan">
                          <option value="" selected>-</option>
                          @forelse ($satuan as $val)
                            <option value="{{ $val->id }}" {{ ($data) ? (($val->id == $data->id_master_satuan ) ? 'selected' : '') : '' }}>{{ $val->satuan }}</option>
                          @empty
                            <tr>
                              <option value="">No Data</option>
                            </tr>
                          @endforelse
                        </select>
                        @error('id_master_satuan')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>
                    </div>
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
                  <a type="button" href="/bank/harga" class="btn btn-default float-right">KEMBALI</a>
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