@extends('layouts.main')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Santri</h1>
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
                        <h3 class="card-title">List Data Santri</h3>
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
                                                        <a class="dropdown-item" href="javascript:void(0)">Ubah</a>
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

<script>
    function hapus(id)
    {
        Swal.fire({
            title: 'Anda Yakin?',
            text: "Data Santri yg dihapus Akan Berpengaruh Pada Data Lain yang Menggunakan Santri Ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus Data Ini!'
            }).then((result) => {
            if (result.value) {
                
                $.post('{{ URL::to('remove/siswa')}}', {id, _token: '{{ csrf_token() }}'}, function(e) {

                    toastr.success('Data Santri Berhasil Dihapus!', function() {
                        window.location.reload(1);
                    })

                });

            }
        })
    }
</script>
@endsection