@extends('kepala ruang.kepalaruang_dashboard')
@section('kepalaruang')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 mb-4 mb-xl-0">
            <h3 class="font-weight-bold" style="font-size: 25px">Profile</h3>
            <hr>
          </div>
        </div>
      </div>
    </div>

    {{-- PROFILE MULAI --}}
    <div class="container">
        <div class="main-body">        
              <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex flex-column align-items-center text-center">
                        <img src="{{ (!empty($profileData->foto)) ?
                            url('upload/admin_images/'.$profileData->foto) : url('upload/ProfileKosong.png') }}" alt="Profile" class="rounded-circle" width="100">                        
                        <div class="mt-3">
                          <h4>{{ $profileData->name }}</h4>
                          <p class="text-secondary mb-1">{{ $profileData->role }}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card mt-3">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <label for="exampleInputUsername1">Nama</label>
                        <span class="text-secondary">{{ $profileData->name }}</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <label for="exampleInputUsername1">Email</label>
                        <span class="text-secondary">{{ $profileData->email }}</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <label for="exampleInputUsername1">Telepon</label>
                        <span class="text-secondary">{{ $profileData->telepon }}</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <label for="exampleInputUsername1">Alamat</label>
                        <span class="text-secondary">{{ $profileData->alamat }}</span>
                      </li>
                    </ul>
                  </div>
                </div>

                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                              <div class="card-body">
                                <h4 class="card-title">Update Kepala Ruang Profile</h4>
                                <form method="POST" action="{{route('kepalaruang.profile.store')}}" class="forms-sample" enctype="multipart/form-data">
                                  @csrf
                                  <div class="form-group">
                                    <label for="exampleInputUsername1">Nama</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $profileData->name}}">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputUsername1">Username</label>
                                    <input type="text" class="form-control" name="username" id="username" value="{{ $profileData->username}}">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{ $profileData->email}}">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Telepon</label>
                                    <input type="text" class="form-control" name="telepon" id="telepon" value="{{ $profileData->telepon}}">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" id="alamat" value="{{ $profileData->alamat}}">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" value="{{ $profileData->password}}">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Foto</label>
                                    <input type="file" class="form-control" name="foto" id="image">
                                  </div>

                                  <div class="form-group">
                                    <img id="showImage" src="{{ (!empty($profileData->foto)) ?
                                        url('upload/admin_images/'.$profileData->foto) : url('upload/ProfileKosong.png') }}" alt="Profile" class="rounded-circle" width="80">  
                                  </div>

                                  <button type="submit" class="btn btn-primary mr-2">Simpan Perubahan</button>

                                </form>
                              </div>
                            </div>
                          </div>
              </div>
    
            </div>
        </div>
    {{-- PROFILE AKHIR --}}
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection