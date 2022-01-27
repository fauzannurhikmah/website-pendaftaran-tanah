@extends('layouts.app',['title'=>'Edit Sertificate'])

@section('style')
    <link rel="stylesheet" href="{{asset('vendor/iziToast/dist/css/iziToast.min.css')}}">
@endsection

@section('content')
<!-- Toastification -->
@if (session()->has('errors')||session()->has('success'))
    <span id="toast" data-status=true data-type="{{session()->has('errors') ? 'error' :'success'}}" data-message="{{session('success')}}"></span>
@endif

      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Sertificate</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Sertificate</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                          <h2 class="card-title">Edit Sertificate</h2>
                          <a href="{{route('sertificate')}}" class="ml-auto btn btn-secondary btn-sm"><i class="fas fa-backward"></i> Back</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{route('edit-sertificate',$sertificate)}}" method="post">
                                @method('put')
                                @csrf
                                <div class="row form-group">
                                    <label for="nik" class="col-md-3 col-form-label">NIK</label>
                                    <div class="col-md-9">
                                        <input type="text" name="nik" id="nik" class="form-control" value="{{old('nik') ?? $sertificate->nik}}">
                                        @error('nik')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="name" class="col-md-3 col-form-label">Name</label>
                                    <div class="col-md-9">
                                        <input type="text" name="name" id="name" class="form-control" value="{{old('name') ?? $sertificate->nama}}">
                                        @error('name')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="date" class="col-md-3 col-form-label">Date of Birth</label>
                                    <div class="col-md-9">
                                        <input type="date" name="date" id="date" class="form-control" value="{{old('date') ?? $sertificate->tgl_lahir}}">
                                        @error('date')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="gender" class="col-md-3 col-form-label">Gender</label>
                                    <div class="col-md-9">
                                        <select name="gender" id="gender" class="custom-select">
                                            <option selected disabled>Choose Gender</option>
                                            <option value="Laki Laki" {{$sertificate->gender=='Laki Laki'?'selected':''}}>Laki Laki</option>
                                            <option value="Perempuan" {{$sertificate->gender=='Perempuan'?'selected':''}}>Perempuan</option>
                                        </select>
                                        @error('gender')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="address" class="col-md-3 col-form-label">Address</label>
                                    <div class="col-md-9">
                                        <textarea name="address" id="address" class="form-control">{{old('address')??$sertificate->alamat}}</textarea>
                                        @error('address')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="religion" class="col-md-3 col-form-label">Religion</label>
                                    <div class="col-md-9">
                                        @php $religion=['Islam','Kristen','Khonghucu','Hindu','Budha'] @endphp
                                        <select name="religion" id="religion" class="custom-select">
                                            <option selected disabled>Choose Religion</option>
                                            @foreach ($religion as $i)
                                            <option value="{{$i}}" {{$sertificate->agama==$i?'selected':''}}>{{$i}}</option>
                                            @endforeach
                                        </select>
                                        @error('religion')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="marital" class="col-md-3 col-form-label">Marital Status</label>
                                    <div class="col-md-9">
                                        @php $marital=['Belum Kawin','Kawin','Cerai Hidup','Cerai Mati'] @endphp
                                        <select name="marital" id="marital" class="custom-select">
                                            <option selected disabled>Choose Status</option>
                                            @foreach ($marital as $i)
                                                <option value="{{$i}}" {{$sertificate->status_perkawinan==$i?'selected':''}}>{{$i}}</option>
                                            @endforeach
                                        </select>
                                        @error('marital')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="profession" class="col-md-3 col-form-label">Profession</label>
                                    <div class="col-md-9">
                                        <input type="text" name="profession" id="profession" class="form-control" value="{{old('profession') ?? $sertificate->pekerjaan}}">
                                        @error('profession')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                 <div class="row form-group">
                                    <label for="archieve" class="col-md-3 col-form-label">Archieve</label>
                                    <div class="col-md-9">
                                        <input type="file" name="archieve" id="archieve" class="form-control">
                                        <p class="mb-0">Berkas Persyaratan <a href="{{route('download',$sertificate->id)}}" class="float-right"><i class="fas fa-download"></i></a></p>
                                        @error('archieve')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="status" class="col-md-3 col-form-label">Status</label>
                                    <div class="col-md-9">
                                        <select name="status" id="status" class="custom-select">
                                            <option selected disabled>Choose Status</option>
                                            <option value="1" {{$sertificate->status?'selected':''}}>Terverifikasi</option>
                                            <option value="0" {{!$sertificate->status?'selected':''}}>Belum Verifikasi</option>
                                        </select>
                                        @error('status')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary btn-lg">Update</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                </div>
            </div>
        </div>
  
      </section>
      <!-- /.content -->
@endsection

@push('script')
  <script src="{{asset('vendor/iziToast/dist/js/iziToast.min.js')}}"></script>
  <script src="{{asset('js/script.js')}}"></script>
@endpush
