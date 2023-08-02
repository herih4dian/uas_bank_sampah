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
          @endif Transaksi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/manajemen/transaksi">Transaksi</a></li>
            <li class="breadcrumb-item active">@if($data)         
              Edit
            @else
              Create
            @endif Nasabah</li>
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
              
              <form class="form-horizontal" action="{{ (request()->is('manajemen/transaksi/create')) ? url('manajemen/transaksi/store') : url('manajemen/transaksi/update', $data->id) }}" method="POST" enctype="multipart/form-data" >
                @csrf
                @if($data)         
                  @method('PUT')
                @else
                  @method('POST') 
                @endif
                <div class="card-body">

                  <div class="form-group">
                    <label>Tanggal:</label>
                      <div class="input-group date" id="reservationdate" data-target-input="nearest">
                          <input type="text" class="form-control datetimepicker-input @error('tanggal_transaksi') is-invalid @enderror" name="tanggal_transaksi" value="{{  old('tanggal_transaksi', ($data) ? date('m/d/Y', strtotime($data->tanggal_transaksi)) : '')  }}" data-target="#reservationdate">
                          <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                      </div>
                  </div>

                  <div class="form-group">
                    <label class="font-weight-bold">Nasabah</label>
                    <select class="form-control rounded-0 custom-select @error('id_nasabah') is-invalid @enderror" name="id_nasabah">
                      <option value="" selected>-</option>
                      @forelse ($nasabah as $val)
                        <option value="{{ $val->id }}" {{ ($data) ? (($val->id == $data->id_nasabah ) ? 'selected' : '') : '' }}>{{ $val->nama }}</option>
                      @empty
                        <tr>
                          <option value="">No Data</option>
                        </tr>
                      @endforelse
                    </select>
                    @error('id_nasabah')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label class="font-weight-bold">Jenis / Type</label>
                    <select class="form-control rounded-0 custom-select @error('id_jenis_sampah') is-invalid @enderror" name="id_jenis_sampah">
                      <option value="" selected>-</option>
                      @forelse ($j_sampah as $val)
                        <option value="{{ $val->id }}" {{ ($data) ? (($val->id == $data->id_jenis_sampah ) ? 'selected' : '') : '' }}>{{ $val->type_sampah }}</option>
                      @empty
                        <tr>
                          <option value="">No Data</option>
                        </tr>
                      @endforelse
                    </select>
                    @error('id_jenis_sampah')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                  </div>

                  <div class="row">
                    <div class="col-sm-8">
                      <div class="form-group">
                        <label class="font-weight-bold">Jumlah</label>
                        <input type="text" class="form-control @error('satuans') is-invalid @enderror" name="satuans" value="{{  old('satuans', ($data) ? $data->satuans : '')  }}" placeholder="Jumlah">
                        @error('nama')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <!--satuan-->
                      <div class="form-group">
                        <label class="font-weight-bold">Satuan</label>
                        <select class="form-control rounded-0 custom-select @error('satuan_status') is-invalid @enderror" name="satuan_status">
                          <option value="" selected>-</option>
                          @forelse ($satuan as $val)
                            <option value="{{ $val->id }}" {{ ($data) ? (($val->id == $data->satuan_status ) ? 'selected' : '') : '' }}>{{ $val->satuan }}</option>
                          @empty
                            <tr>
                              <option value="">No Data</option>
                            </tr>
                          @endforelse
                        </select>
                        @error('satuan_status')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>
                      <!--satuan-->
                    </div>

                  </div>

                  {{-- <div class="form-group">
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
                  </div> --}}

                  {{-- <div class="form-group">
                    <label class="font-weight-bold">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{  old('nama', ($data) ? $data->nama : '')  }}" placeholder="Masukkan Nama">
                    @error('nama')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label class="font-weight-bold">Alamat</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="5" placeholder="Masukkan Alamat">{{ old('alamat', ($data) ? $data->alamat : '') }}</textarea>
                    @error('alamat')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                  </div> --}}

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
                  <a type="button" href="/manajemen/transaksi" class="btn btn-default float-right">KEMBALI</a>
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