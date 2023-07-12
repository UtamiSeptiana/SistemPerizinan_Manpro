@extends('admin.admin_dashboard')
@section('admin')

<div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 mb-4 mb-xl-0">
            <h3 class="font-weight-bold" style="font-size: 25px">Daftar Cuti Pegawai RSOP Ciamis</h3>
            <hr>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div style="margin-left: 720px" class="input-group">
            <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
              <span class="input-group-text" id="search">
                <i class="icon-search"></i>
              </span>
            </div>
            <form action="/admin/cutiadmin" method="GET">
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
                  <th>Lama</th>
                  <th>Alasan</th>
                  <th>Acc Kepala Ruang</th>
                  <th>Acc HRD</th>
                  <th>Acc Manajer</th>
                  <th>Acc Direktur</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = $data->firstItem() ?>
                  @foreach ($data as $item)
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$item->nama}}</td>
                  <td>{{$item->jabatan}}</td>
                  <td>{{$item->divisi}}</td>
                  <td>{{$item->tgl_mulai}}</td>
                  <td>{{$item->lama}}</td>
                  <td>{{$item->alasan}}</td>
                  <td>
                    @if ($item['status_kepalaruang'] == "-")
                    <span class=text-warning>-</span>
                        @endif
                        @if ($item['status_kepalaruang'] == "Setuju")
                    <span class=text-primary>Disetujui</span>
                        @endif
                        @if ($item['status_kepalaruang'] == "Tolak")
                    <span class=text-danger>Ditolak</span>
                        @endif
                  </td>
                  <td>
                    @if ($item['status_hrd'] == "-")
                    <span class=text-warning>-</span>
                        @endif
                        @if ($item['status_hrd'] == "Setuju")
                    <span class=text-primary>Disetujui</span>
                        @endif
                        @if ($item['status_hrd'] == "Tolak")
                    <span class=text-danger>Ditolak</span>
                        @endif
                  </td>
                  <td>
                    @if ($item['status_manajer'] == "-")
                    <span class=text-warning>-</span>
                        @endif
                        @if ($item['status_manajer'] == "Setuju")
                    <span class=text-primary>Disetujui</span>
                        @endif
                        @if ($item['status_manajer'] == "Tolak")
                    <span class=text-danger>Ditolak</span>
                        @endif
                  </td>
                  <td>
                    @if ($item['status_direktur'] == "-")
                    <span class=text-warning>-</span>
                        @endif
                        @if ($item['status_direktur'] == "Setuju")
                    <span class=text-primary>Disetujui</span>
                        @endif
                        @if ($item['status_direktur'] == "Tolak")
                    <span class=text-danger>Ditolak</span>
                        @endif
                  </td>
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