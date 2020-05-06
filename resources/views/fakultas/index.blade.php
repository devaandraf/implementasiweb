@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>Fakultas</h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <form method="GET" class="form-inline">
              <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request()->get('search') }}">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Cari</button>
              </div>
            </form>
            <a href="fakultas" class="pull-right">
              <button type="button" class="btn btn-info">Semua Data</button>
            </a>
          </div>
          <div class="card-header">
            <a href="{{url('fakultas/tambahFakultas')}}">
              <button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Fakultas</button>
            </a>
            <a href="{{url('fakultas/importFakultas')}}">
              <button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Import Excel</button>
            </a>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama Fakultas</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
               @forelse($fakultas as $key => $f)
                <tr>
                  <td>{{ $fakultas->firstItem()+$key }}</td>
                  <td>{{ $f->nama_fakultas}}</td>
                  <td>
                    <a href="{{url('fakultas/'.$f->id.'/edit')}}" class="btn btn-warning btn-sm">EDIT</a>
                    <a href="{{url('fakultas/'.$f->id.'/delete')}}" class="btn btn-danger btn-sm">HAPUS</a> 
                  </td>
                </tr>
               @empty
                <tr>
                  <td colspan="3"><center>Data kosong</center></td>
                </tr>
                @endforelse
              </tbody>
            </table>
            <div class="pull-right">{{$fakultas->links()}}</div>
          </div>
          <div class="card-footer text-right">
            <nav class="d-inline-block">
              
            </nav>
          </div>
        </div>
      </div>  

  </div>

</section>
@endsection()