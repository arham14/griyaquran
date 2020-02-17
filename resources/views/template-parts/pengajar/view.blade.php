@extends('layouts.main')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Pengajar</h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">List Data Pengajar</h3>
                    </div>
                    
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align:center; width: 10%">No</th>
                                    <th style="text-align:center; width: 25%">Nama</th>
                                    <th style="text-align:center; width: 15%">HP</th>
                                    <th style="text-align:center; width: 30%">Alamat</th>
                                    <th style="text-align:center; width: 20%">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=1; @endphp
                                @foreach($data as $value)
                                    <tr>
                                        <td style="text-align:center; width: 10%">{{$no}}.</td>
                                        <td style="text-transform:uppercase; text-align:left; width: 25%">{{$value->nama}}</td>
                                        <td style="text-align:center; width: 15%">{{$value->no_hp}}</td>
                                        <td style="text-align:left; width: 30%">{{$value->alamat}}</td>
                                        <td style="text-align:center; width: 20%">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary">Action</button>
                                                <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                    <div class="dropdown-menu" role="menu">
                                                        <a class="dropdown-item" href="javascript:void(0)" onclick="detail('{{$value->id}}')">Ubah</a>
                                                        <a class="dropdown-item" href="javascript:void(0)" onclick="hapus('{{$value->id}}')">Hapus</a>
                                                    </div>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @php $no++; @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Form Edit</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_pengajar">

            <form role="form">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="santri">Nama Pengajar</label>
                                <input type="text" class="form-control" id="nama_pengajar">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="santri">No HP</label>
                                <input type="text" class="form-control" id="no_hp">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="nama">Alamat Pengajar</label>
                                <textarea rows="3" class="form-control" id="alamat" placeholder="Alamat Pengajar..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="update()">Ubah</button>
        </div>
        </div>
    </div>
</div>

<script>
    function hapus(id)
    {
        Swal.fire({
            title: 'Anda Yakin?',
            text: "Data Pengajar yg dihapus Akan Berpengaruh Pada Data Lain yang Menggunakan Pengajar Ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus Data Ini!'
            }).then((result) => {
            if (result.value) {
                
                $.post('{{ URL::to('remove/pengajar')}}', {id, _token: '{{ csrf_token() }}'}, function(e) {

                    toastr.success('Data Pengajar Berhasil Dihapus!', function() {
                        window.location.reload(1);
                    })

                });

            }
        })
    }

    function detail(id)
    {
        
        $('#modal-edit').modal('show');

        $.post('{{ URL::to('detail/pengajar')}}', {id, _token: '{{ csrf_token() }}'}, function(e) {

            $('#id_pengajar').val(e[0].id);

            $('#nama_pengajar').val(e[0].nama);

            $('#no_hp').val(e[0].no_hp);

            $('#alamat').val(e[0].alamat);

            document.getElementById("nama_pengajar").focus();

        });
    }

    function update()
    {
        var id = $('#id_pengajar').val();

        var nama = $('#nama_pengajar').val();

        var alamat = $('#alamat').val();

        var no_hp = $('#no_hp').val();

        if(nama === "")
        {
            var nama = "-"
        }

        if(alamat === "")
        {
            var alamat = "-"
        }

        if(no_hp === "")
        {
            var no_hp = "-"
        }

        $.post('{{ URL::to('update/pengajar')}}', {id, nama, alamat, no_hp, _token: '{{ csrf_token() }}'}, function(e) {

            toastr.success('Data Pengajar Berhasil Diupdate!', function() {
                window.location.reload(1);
            })

        });
    }
</script>
@endsection