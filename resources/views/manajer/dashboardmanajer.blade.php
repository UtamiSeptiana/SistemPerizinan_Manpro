@extends('manajer.manajer_dashboard')
@section('manajer')

<div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 mb-4 mb-xl-0">
            <h3 class="font-weight-bold" style="font-size: 25px">Informasi Permintaan Pengajuan Cuti</h3>
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
                <span class="fs-30 mb-2" style="margin-left: 90px">{{$jumlahBelumDisetujui}}</span>
                <p style="font-size: 20px; margin-top:40px">Belum Disetujui</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-dark-blue">
              <div class="card-body">
                <img src="../../build/assets/images/briefcase.svg" alt="">
                <span class="fs-30 mb-2" style="margin-left: 90px">{{$jumlahMenyetujui}}</span>
                <p style="font-size: 20px; margin-top:40px">Menyetujui</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 grid-margin transparent">
        <div class="row">
          <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-tale">
              <div class="card-body">
                <img src="../../build/assets/images/briefcase.svg" alt="">
                <span class="fs-30 mb-2" style="margin-left: 90px">{{$jumlahMenolak}}</span>
                <p style="font-size: 20px; margin-top:40px">Menolak</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
    
@endsection