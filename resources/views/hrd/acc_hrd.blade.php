@extends('hrd.hrd_dashboard')
@section('hrd')

<div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 mb-4 mb-xl-0">
            <h3 class="font-weight-bold" style="font-size: 25px">DETAIL PENGAJUAN</h3>
            <hr>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <form method="POST" action="{{url('hrd/acchrdedit'.$data->id)}}" class="form-sample">
                @csrf
                @method('patch')
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-9">
                        <label class="form-control" for="">{{ $data->nama }}</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Jabatan</label>
                    <div class="col-sm-9">
                        <label class="form-control" for="">{{ $data->jabatan }}</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Divisi</label>
                    <div class="col-sm-9">
                        <label class="form-control" for="">{{ $data->divisi }}</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tanggal Cuti</label>
                    <div class="col-sm-9">
                        <label class="form-control" for="">{{ $data->tgl_mulai }}</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tanggal Selesai</label>
                    <div class="col-sm-9">
                        <label class="form-control" for="">{{ $data->tgl_selesai }}</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Lama</label>
                    <div class="col-sm-9">
                        <label class="form-control" for="">{{ $data->lama }} hari</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Alasan</label>
                    <div class="col-sm-9">
                        <label class="form-control" for="">{{ $data->alasan }}</label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Status Persetujuan</label>
                      <div class="col-sm-9">
                        <select value="{{ $data->status_hrd }}" name="status_hrd" id="status_hrd" class="form-control">
                          <option value="">--Pilih Status--</option>
                          <option value="Tolak" {{ $data->status_hrd == 'Tolak' ? 'selected' : '' }} >Tolak</option>
                          <option value="Setuju" {{ $data->status_hrd == 'Setuju' ? 'selected' : '' }} >Setuju</option>
                        </select>
                      </div>
                    </div>
                </div>
              </div>
              
              <button style="margin-left: 350px" type="submit" class="btn btn-primary mr-2">Submit</button>
              <a href="{{route('hrd.persetujuanhrd')}}" class="btn btn-light">Cancel</a>
            </form>
          </div>
        </div>
      </div>

</div>
    
@endsection