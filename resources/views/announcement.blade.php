@extends('layouts.front',['title'=>'Announcement'])

@section('content')
<section class="services mt-5">
    <div class="container">
        <div class="section-title">
            <h2>Announcement</h2>
            <p>Magnam dolores commodi suscipit consequatur ex aliquid</p>
          </div>
          @forelse ($sertificate as $item)
            <div class="icon-box bg-light position-relative">
                <div class="row">
                    <div class="col-md-10 row">
                        <div class="col-md-2">
                            <i class="bi bi-card-checklist w-100"></i>
                        </div>
                        <div class="col-md-10">
                            <h4 class="m-0"><a href="#">NIK {{$item->nik}}</a></h4>
                            <p class="m-0 ">{{$item->nama}} &bullet; {{$item->tgl_lahir}} &bullet; {{$item->gender}}</p>
                            <a href="{{route('edit-serti',$item->id)}}" class="p-2 shadow-sm small"><strong>edit</strong></a><a href="#" data-toggle="modal" data-target="#deleteModal{{$item->id}}" class="p-2 m-1 shadow-sm small text-danger"><strong>Delete</strong></a>
                            <x-delete-modal id="{{$item->id}}" link="{{route('delete-serti', $item->id)}}"></x-delete-modal>
                            {{-- <div class="alert alert-info p-2 border-0" style="border-left: 5px solid #fd5e5e !important">Tolong dicek kembali berkas persyaratannya</div> --}}
                        </div>
                    </div>
                    <div class="col-md-2 align-self-center text-center">
                        @if ($item->status)
                        <span class="btn btn-sm btn-primary">Terverifikasi</span>
                        @else
                        <span class="btn btn-sm btn-danger">Belum Diverifikasi</span>
                        @endif
                    </div>
                </div>
                <span class="text-primary small" style="position:absolute;right:7px;bottom:5px;font-style:italic">{{$item->created_at}}</>
            </div>
          @empty
          <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-body border-0 shadow-sm text-center">
                    <h1><i class="bx bx-cube-alt text-primary"></i></h1>
                    <h1 style="font-size: 4rem; font-weight: bolder;">404</h3>
                    <p>Empty</p>
                </div>
              </div>
          </div>
          @endforelse
    </div>
</section>
@endsection