@extends('layouts.main')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Griya Quran</h1>
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
                        <h3 class="card-title">List Data Griya</h3>
                    </div>
                    
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align:center; width: 10%">No</th>
                                    <th style="text-align:center; width: 50%">Nama</th>
                                    <th style="text-align:center; width: 40%">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=1; @endphp
                                @foreach($data as $value)
                                    <tr>
                                        <td style="text-align:center; width: 10%">{{$no}}.</td>
                                        <td style="text-align:left; width: 50%">{{$value->nama}}</td>
                                        <td style="text-align:center; width: 40%">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary">Action</button>
                                                <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                    <div class="dropdown-menu" role="menu">
                                                        <a class="dropdown-item" href="javascript:void(0)"  onclick="detail('{{$value->id}}')">Ubah</a>
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
            <input type="hidden" id="id_griya">

            <form role="form">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="santri">Nama Griya</label>
                                <input type="text" class="form-control" id="nama-griya">
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
            text: "Data Griya yg dihapus Akan Berpengaruh Pada Data Lain yang Menggunakan Griya Ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus Data Ini!'
            }).then((result) => {
            if (result.value) {
                
                $.post('{{ URL::to('remove/griya')}}', {id, _token: '{{ csrf_token() }}'}, function(e) {

                    toastr.success('Data Griya Berhasil Dihapus!', function() {
                        window.location.reload(1);
                    })

                });

            }
        })
    }

    function detail(id)
    {
        
        $('#modal-edit').modal('show');

        $.post('{{ URL::to('detail/griya')}}', {id, _token: '{{ csrf_token() }}'}, function(e) {

            $('#id_griya').val(e[0].id);

            $('#nama-griya').val(e[0].nama);

            document.getElementById("nama-griya").focus();

        });
    }

    function update()
    {
        var id = $('#id_griya').val();

        var nama = $('#nama-griya').val();


        $.post('{{ URL::to('update/griya')}}', {id, nama, _token: '{{ csrf_token() }}'}, function(e) {

            toastr.success('Data Griya Berhasil Diupdate!', function() {
                window.location.reload(1);
            })

        });
    }
</script>
@endsection