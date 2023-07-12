@extends('admin.admin_dashboard')
@section('admin')

<div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 mb-4 mb-xl-0">
            <h3 class="font-weight-bold" style="font-size: 25px">RSOP CIAMIS</h3>
            <hr>
          </div>

        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 grid-margin transparent">
        <div class="row">
          <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-tale">
              <div class="card-body">
                <img src="../../build/assets/images/briefcase.svg" alt="">
                <span class="fs-30 mb-2" style="margin-left: 90px">{{ $totalPengajuan }}</span>
                <p style="font-size: 20px; margin-top:40px">Daftar Pengajuan Cuti</p>
              </div>
            </div>
          </div>  
          <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-dark-blue">
              <div class="card-body">
                <img src="../../build/assets/images/users (1).svg" alt="">
                <span class="fs-30 mb-2" style="margin-left: 90px">{{ $jumlahUser }}</span>
                <a href="{{route('admin.daftarpegawai')}}">
                  <p style="font-size: 20px; color:white; margin-top:40px">Daftar Pegawai</p>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    
@endsection