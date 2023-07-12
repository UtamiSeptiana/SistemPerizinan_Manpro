@extends('manajer.manajer_dashboard')
@section('manajer')

<div class="content-wrapper">

    <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="row">
            <div class="col-12 mb-4 mb-xl-0">
              <h3 class="font-weight-bold" style="font-size: 25px">Daftar Cuti yang Menunggu Persetujuan</h3>
              <hr>
            </div>
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
              <form action="/manajer/persetujuanmanajer" method="GET">
                    <input name="search" type="search" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
              </form>
            </div>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Divisi</th>
                    <th>Tanggal</th>
                    <th>Alasan</th>
                    <th>Acc Manajer</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = $data->firstItem() ?>
                    @foreach ($data as $item)
                  <tr>
                      @if($item->status_kepalaruang == 'Tolak' && $item->jabatan == 'Pegawai')
                      @else
                          <td>{{$i}}</td>
                          <td>{{$item->nama}}</td>
                          <td>{{$item->jabatan}}</td>
                          <td>{{$item->divisi}}</td>
                          <td>{{$item->tgl_mulai}}</td>
                          <td>{{$item->alasan}}</td>
                          <td>{{$item->status_manajer}}</td>
                          <td>
                              {{-- JABATAN PEGAWAI STATUS KEPALA RUANG TIDAK SAMA DENGAN 'SETUJU' --}}
                              @if($item->status_kepalaruang !== 'Setuju' && $item->jabatan == 'Pegawai')
                                {{-- <button disabled>Tidak Aktif</button> --}}
                              @else
                                {{-- <button>Aktif</button>  --}} 
                                <a href="{{route('manajer.accmanajer',$item->nama)}}" class="btn btn-primary btn-sm">PERSETUJUAN</a>
                              @endif
                          </td>
                      @endif
                  </tr>
                  <?php $i++ ?>
                  @endforeach
                </tbody>
              </table>
            </div>
            <br>
            <div style="margin-left: 720px">{{ $data->links() }}</div>
          </div>
        </div>
      </div>
</div>

@endsection