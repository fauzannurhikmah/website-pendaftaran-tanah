@extends('layouts.front',['title'=>"Registration"])

@section('style')
    <link rel="stylesheet" href="{{asset('vendor/iziToast/dist/css/iziToast.min.css')}}">
@endsection

@section('content')
<!-- Toastification -->
@if (session()->has('errors')||session()->has('success'))
    <span id="toast" data-status=true data-type="{{session()->has('errors') ? 'error' :'success'}}" data-message="{{session('success')}}"></span>
@endif

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
  
          <div class="d-flex justify-content-between align-items-center">
            <h2>Registration @if (request()->routeIs('edit-serti')) ID {{$sertificate->id}} @endif</h2>
            <ol>
              <li><a href="/">Home</a></li>
              <li>Registration</li>
            </ol>
          </div>
  
        </div>
      </section><!-- End Breadcrumbs -->

      <section id="portfolio-details" class="portfolio-details">
        <div class="container">
  
          <div class="row gy-4">
  
            <div class="col-lg-8">
                @if (request()->routeIs('registration'))
                <form action="{{route('registration')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row input-group mb-3">
                        <label for="nik" class="col-md-3 col-form-label">NIK</label>
                        <div class="col-md-9">
                            <input type="text" name="nik" id="nik" class="form-control">
                            @error('nik')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row input-group mb-3">
                        <label for="name" class="col-md-3 col-form-label">Name</label>
                        <div class="col-md-9">
                            <input type="text" name="name" id="name" class="form-control">
                            @error('name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row input-group mb-3">
                        <label for="date" class="col-md-3 col-form-label">Date of Birth</label>
                        <div class="col-md-9">
                            <input type="date" name="date" id="date" class="form-control">
                            @error('date')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row input-group mb-3">
                        <label for="gender" class="col-md-3 col-form-label">Gender</label>
                        <div class="col-md-9">
                            <select name="gender" id="gender" class="form-control">
                                <option selected disabled>Choose Gender</option>
                                <option value="Laki Laki">Laki Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            @error('gender')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row input-group mb-3">
                        <label for="address" class="col-md-3 col-form-label">Address</label>
                        <div class="col-md-9">
                            <textarea name="address" id="address" class="form-control"></textarea>
                            @error('address')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row input-group mb-3">
                        <label for="religion" class="col-md-3 col-form-label">Religion</label>
                        <div class="col-md-9">
                            @php $religion=['Islam','Kristen','Khonghucu','Hindu','Budha'] @endphp
                            <select name="religion" id="religion" class="form-control">
                                <option selected disabled>Choose Religion</option>
                                @foreach ($religion as $i)
                                <option value="{{$i}}">{{$i}}</option>
                                @endforeach
                            </select>
                            @error('religion')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row input-group mb-3">
                        <label for="marital" class="col-md-3 col-form-label">Marital Status</label>
                        <div class="col-md-9">
                            @php $marital=['Belum Kawin','Kawin','Cerai Hidup','Cerai Mati'] @endphp
                            <select name="marital" id="marital" class="form-control">
                                <option selected disabled>Choose Status</option>
                                @foreach ($marital as $i)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endforeach
                            </select>
                            @error('marital')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row input-group mb-3">
                        <label for="profession" class="col-md-3 col-form-label">Profession</label>
                        <div class="col-md-9">
                            <input type="text" name="profession" id="profession" class="form-control">
                            @error('profession')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row input-group mb-3">
                        <label for="archieve" class="col-md-3 col-form-label">Archieve *</label>
                        <div class="col-md-9">
                            <input type="file" name="archieve" id="archieve" class="form-control">
                            @error('archieve')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <input type="hidden" name="status" value="0">
                    <div class="input-group mb-3 text-right">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
                @endif

                @if (request()->routeIs('edit-serti'))
                <form action="{{route('edit-serti',$sertificate->id)}}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="row input-group mb-3">
                        <label for="nik" class="col-md-3 col-form-label">NIK</label>
                        <div class="col-md-9">
                            <input type="text" name="nik" id="nik" class="form-control" value="{{old('nik') ?? $sertificate->nik}}">
                            @error('nik')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row input-group mb-3">
                        <label for="name" class="col-md-3 col-form-label">Name</label>
                        <div class="col-md-9">
                            <input type="text" name="name" id="name" class="form-control" value="{{old('name') ?? $sertificate->nama}}">
                            @error('name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row input-group mb-3">
                        <label for="date" class="col-md-3 col-form-label">Date of Birth</label>
                        <div class="col-md-9">
                            <input type="date" name="date" id="date" class="form-control" value="{{old('date') ?? $sertificate->tgl_lahir}}">
                            @error('date')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row input-group mb-3">
                        <label for="gender" class="col-md-3 col-form-label">Gender</label>
                        <div class="col-md-9">
                            <select name="gender" id="gender" class="form-control">
                                <option selected disabled>Choose Gender</option>
                                <option value="Laki Laki" {{$sertificate->gender=='Laki Laki'?'selected':''}}>Laki Laki</option>
                                <option value="Perempuan" {{$sertificate->gender=='Perempuan'?'selected':''}}>Perempuan</option>
                            </select>
                            @error('gender')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row input-group mb-3">
                        <label for="address" class="col-md-3 col-form-label">Address</label>
                        <div class="col-md-9">
                            <textarea name="address" id="address" class="form-control">{{old('address')??$sertificate->alamat}}</textarea>
                            @error('address')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row input-group mb-3">
                        <label for="religion" class="col-md-3 col-form-label">Religion</label>
                        <div class="col-md-9">
                            @php $religion=['Islam','Kristen','Khonghucu','Hindu','Budha'] @endphp
                            <select name="religion" id="religion" class="form-control">
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
                    <div class="row input-group mb-3">
                        <label for="marital" class="col-md-3 col-form-label">Marital Status</label>
                        <div class="col-md-9">
                            @php $marital=['Belum Kawin','Kawin','Cerai Hidup','Cerai Mati'] @endphp
                            <select name="marital" id="marital" class="form-control">
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
                    <div class="row input-group mb-3">
                        <label for="profession" class="col-md-3 col-form-label">Profession</label>
                        <div class="col-md-9">
                            <input type="text" name="profession" id="profession" class="form-control" value="{{old('profession') ?? $sertificate->pekerjaan}}">
                            @error('profession')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row input-group mb-3">
                        <label for="archieve" class="col-md-3 col-form-label">Archieve *</label>
                        <div class="col-md-9">
                            <input type="file" name="archieve" id="archieve" class="form-control">
                            <p class="mb-0">Berkas Persyaratan<a href="{{route('download',$sertificate->id)}}" style="float: right">download</a></p>
                            @error('archieve')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <input type="hidden" name="status" value="0">
                    <div class="input-group mb-3 text-right">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
                @endif
            </div>
  
            <div class="col-lg-4">
              <div class="portfolio-info">
                <h3>Information</h3>
                <ul>
                  <li><strong>Archieve</strong>: Berkas berupa persyaratan bisa discan kemudian disatukan kedalam file dengan format pdf ataupun docx </li>
                  <li><strong>Attention</strong>: Perhatikan dengan teliti ketika anda mamasukan data</li>
                  <li><strong>Announcement</strong>: Ketika anda telah selesai memasukan data, kami akan melakukan verifikasi data dan kemudian memberitahukan hasilnya kepada anda</li>
                  <li><strong class="text-primary">Result</strong>: Untuk mengetahui hasil pembuatan sertifikat tanah, anda bisa mengakses menu announcement (pastikan anda sudah login) </li>
                </ul>
              </div>
            </div>
  
          </div>
  
        </div>
      </section><!-- End Portfolio Details Section -->
@endsection

@push('script')
  <script src="{{asset('vendor/iziToast/dist/js/iziToast.min.js')}}"></script>
  <script src="{{asset('js/script.js')}}"></script>
@endpush
