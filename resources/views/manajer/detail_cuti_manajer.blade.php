@extends('manajer.manajer_dashboard')
@section('manajer')

<div class="content-wrapper">

    <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="row">
            <div class="col-12 mb-4 mb-xl-0">
              <h3 class="font-weight-bold" style="font-size: 25px">DETAIL CUTI</h3>
              <hr>
            </div>
          </div>
        </div>
    </div>
    <div class="col-md-5 mb-3">
        <a href="{{route('manajer.persetujuanmanajer')}}" class="btn btn-danger btn-md">Kembali</a>
        <br>
        <br>
        <div class="card">
          <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <label for="exampleInputUsername1">Nama   :</label>
              <span class="text-secondary">{{-- {{ $profileData->name }} --}}Luvi</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <label for="exampleInputUsername1">Jabatan    :</label>
              <span class="text-secondary">{{-- {{ $profileData->email }} --}}Kepala Ruang</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <label for="exampleInputUsername1">Divisi :</label>
              <span class="text-secondary">{{-- {{ $profileData->telepon }} --}}Divisi Gawat Darurat</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <label for="exampleInputUsername1">Tanggal    :</label>
              <span class="text-secondary">{{-- {{ $profileData->alamat }} --}}22/09/2023
                <span style="color: black">  s/d 
                    <span class="text-secondary">{{-- {{ $profileData->alamat }} --}}24/082023</span>
                </span>
              </span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <label for="exampleInputUsername1">Lama :</label>
                <span class="text-secondary">{{-- {{ $profileData->telepon }} --}}15
                    <span style="color: black"> Hari</span>
                </span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <label for="exampleInputUsername1">Alasan   :</label>
                <span class="text-secondary">Perjalanan ke Manado{{-- {{ $profileData->telepon }} --}}</span>
              </li>
          </ul>
        </div>
      </div>


</div>

@endsection