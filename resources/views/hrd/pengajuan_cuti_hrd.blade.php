@extends('hrd.hrd_dashboard')
@section('hrd')

<div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 mb-4 mb-xl-0">
            <h3 class="font-weight-bold" style="font-size: 25px">Form Pengajuan Cuti HRD</h3>
            <hr>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <form method="POST" action="{{route('hrd.pengajuancutihrdstore')}}" class="form-sample">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-9">
                      <input value="{{ Session::get('nama') }}" name="nama" id="nama" type="text" class="form-control" />
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Jabatan</label>
                      <div class="col-sm-9">
                        <select value="{{ Session::get('jabatan') }}" name="jabatan" id="jabatan" class="form-control">
                          <option value="">--Pilih Jabatan--</option>
                          <option value="Pegawai">Pegawai</option>
                          <option value="Kepala Ruang">Kepala Ruang</option>
                          <option value="HRD">HRD</option>
                          <option value="Manajer">Manajer</option>
                          <option value="Direktur">Direktur</option>
                        </select>
                      </div>
                    </div>
                </div>
              </div>

{{--               <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Divisi</label>
                      <div class="col-sm-9">
                        <select value="{{ Session::get('divisi') }}" name="divisi" id="divisi" class="form-control">
                          <option value="">--Pilih Divisi--</option>
                          <option value="Departemen Gawat Darurat">Departemen Gawat Darurat</option>
                          <option value="Departemen Bedah Umum">Departemen Bedah Umum</option>
                          <option value="Departemen Bedah Tulang">Departemen Bedah Tulang</option>
                          <option value="Departemen Neurologi">Departemen Neurologi</option>
                          <option value="Departemen Penyakit Dalam">Departemen Penyakit Dalam</option>
                          <option value="Departemen Anestesiologi">Departemen Anestesiologi</option>
                          <option value="Departemen Radiologi">Departemen Radiologi</option>
                          <option value="Departemen Farmasi">Departemen Farmasi</option>
                          <option value="Departemen Psikiatri">Departemen Psikiatri</option>
                        </select>
                      </div>
                    </div>
                </div>
              </div> --}}

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tanggal</label>
                    <div class="col-sm-9">
                      <input value="{{ Session::get('tgl_mulai') }}" name="tgl_mulai" id="tgl_mulai" type="date" class="form-control" />
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-9">
                      <input value="{{ Session::get('tgl_selesai') }}" name="tgl_selesai" id="tgl_selesai" type="date" class="form-control" />
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="lama">Lama</label>
                    <div class="col-sm-9">
                      <input name="lama" id="lama" type="text" class="form-control" readonly />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Hari</label>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Alasan</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" value="{{ Session::get('alasan') }}" name="alasan" id="alasan" cols="47" rows="5"></textarea>
                    </div>
                  </div>
                </div>
              </div>

              <a href="{{route('hrd.approvalhrd')}}" class="btn btn-light" style="margin-left: 280px">Cancel</a>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
            </form>
          </div>
        </div>
      </div>

</div>
<script>
  $(document).ready(function() {
    $("#tgl_selesai").on("change", function() {
      const tgl_mulai = new Date($("#tgl_mulai").val()); 
      const tgl_selesai = new Date($("#tgl_selesai").val()); 
      const diffInDays = Math.floor((tgl_selesai.getTime() - tgl_mulai.getTime()) / (1000 * 60 * 60 * 24)); // Hitung selisih dalam hari 

      console.log(diffInDays); 
      $("#lama").val(diffInDays);
    });
  });
</script>   
@endsection