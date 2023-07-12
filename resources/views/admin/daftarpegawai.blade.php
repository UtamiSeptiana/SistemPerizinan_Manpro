@extends('admin.admin_dashboard')
@section('admin')

<div class="content-wrapper">

    <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="row">
            <div class="col-12 mb-4 mb-xl-0">
              <h3 class="font-weight-bold" style="font-size: 25px">Daftar Pegawai RSOP Ciamis</h3>
              <hr>
            </div>
          </div>
        </div>
      </div>

        <div class="col-md-12 grid-margin">
          <div class="row">
            <div class="col-12 mb-4 mb-xl-0">
              <a class="btn btn-danger" href="{{route('admin.dashboard')}}">Kembali</a>
            </div>
          </div>
        </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div style="margin-left: 710px" class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <form action="/admin/daftarpegawai" method="GET">
                    <input name="search" type="search" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
              </form>
            </div>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Jabatan</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = $data->firstItem() ?>
                    @foreach ($data as $item)
                  <tr>
                    <td>{{$i}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->username}}</td>
                    <td>{{$item->role}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->telepon}}</td>
                    <td>{{$item->alamat}}</td>
                  </tr>
                  <?php $i++ ?>
                  @endforeach
                </tbody>
              </table>
            </div>
            <br>
            <div style="margin-left: 730px">{{ $data->links() }}</div>
        </div>
    </div>
</div>

@endsection