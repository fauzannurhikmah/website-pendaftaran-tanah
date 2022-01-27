<button class="btn btn-sm btn-info" data-toggle="modal" data-target="#detailModal{{$item->id}}"><i class="fas fa-eye"></i></button>
<!-- detail Modal-->
<div class="modal fade" id="detailModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Detail {{$index}}</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body text-left">
            <p class="text-primary"># {{$item->nik}}</p>
            <h5 class="font-weight-bold"> {{$item->nama}} <small class="d-block text-primary">{{$item->tgl_lahir}}</small> </h5>
            <table class="table table-borderless">
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>:</td>
                    <td>{{$item->gender}}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>:</td>
                    <td>{{$item->alamat}}</td>
                </tr>
                <tr>
                    <th>Agama</th>
                    <td>:</td>
                    <td>{{$item->agama}}</td>
                </tr>
                <tr>
                    <th>Status Perkawinan</th>
                    <td>:</td>
                    <td>{{$item->status_perkawinan}}</td>
                </tr>
                <tr>
                    <th>Pekerjaan</th>
                    <td>:</td>
                    <td>{{$item->pekerjaan}}</td>
                </tr>
                <tr>
                    <th>Berkas Persyaratan</th>
                    <td>:</td>
                    <td><a href="{{route('download',$item->id)}}" class="btn btn-sm btn-primary">Download</a></td>
                </tr>
            </table>
        </div>
    </div>
</div>
</div>