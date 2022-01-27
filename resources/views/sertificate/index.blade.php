@extends('layouts.app',['title'=>'Sertificate'])

@section('style')
    <!-- DataTables -->
  <link rel="stylesheet" href="/vendor/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/vendor/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/vendor/datatables-buttons/css/buttons.bootstrap4.min.css">
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
                          <h2 class="card-title">Sertificate List</h2>
                          <a href="{{route('create-sertificate')}}" class="ml-auto btn btn-secondary btn-sm"><i class="fas fa-plus"></i> Tambah Data</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                              <th>#</th>
                              <th>NIK</th>
                              <th>Nama</th>
                              <th>Status</th>
                              <th class="text-center">Actions
                                <small class="d-block text-primary">Detail | Edit | Delete</small>
                              </th>
                            </tr>
                            </thead>
                            <tbody>
                              @forelse ($sertificates as $index=>$item)
                                <tr>
                                  <td>{{++$index}}</td>
                                  <td>{{$item->nik}}</td>
                                  <td>
                                    <p class="my-0">{{$item->nama}}</p>
                                    <p class="small my-0 text-primary">{{$item->tgl_lahir}}</p>
                                  </td>
                                  <td>{!! $item->status ? '<span class="badge badge-success rounded-pill px-2">Terverifikasi</span>' : '<span class="badge badge-danger rounded-pill px-2">Belum verifikasi</span>' !!}</td>
                                  <td class="text-center">
                                    @include('sertificate.detail')
                                    <a href="{{route('edit-sertificate',$item->id)}}" class="btn btn-sm btn-primary mx-1"><i class="fas fa-edit"></i></a>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{$item->id}}"><i class="fas fa-trash"></i></button>
                                    <x-delete-modal id="{{$item->id}}" link="{{route('delete-sertificate', $item->id)}}"></x-delete-modal>
                                  </td>
                                </tr>
                              @empty
                                <tr>
                                  <td colspan="5" class="text-center"><p class="lead">Empty <i class="fas fa-exlamation-triangle text-warning"></i></p></td>
                                </tr>
                              @endforelse
                            </tbody>
                          </table>

                          <div class="d-flex justify-content-end">
                            {!! $sertificates->links() !!}
                          </div>
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
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/vendor/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/vendor/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/vendor/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/vendor/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/vendor/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/vendor/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/vendor/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="/js/dataTable.js"></script>
    <script src="{{asset('vendor/iziToast/dist/js/iziToast.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
@endpush