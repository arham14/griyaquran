@extends('layouts.main')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Pembelajaran</h1>
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
                        <h3 class="card-title">List Data Pembelajaran</h3>
                    </div>
                    
                    <div class="card-body table-responsive p-0">
                        <div class="row">
                            <div class="col-md-12" style="padding:15px; text-align:right">
                                Filter By: 
                                <select id="filter" style="height:25px" onchange="loadData()">
                                    <option value="all">All Data</option>
                                    <option value="liqo">Sudah Liqo'</option>
                                    <option value="dinar">Sudah Dinar'</option>
                                </select>
                            </div>
                        </div>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align:center; width: 5%">No</th>
                                    <th style="text-align:center; width: 15%">Nama</th>
                                    <th style="text-align:center; width: 15%">Pengajar</th>
                                    <th style="text-align:center; width: 10%">Griya</th>
                                    <th style="text-align:center; width: 5%">Jilid</th>
                                    <th style="text-align:center; width: 10%">Hari</th>
                                    <th style="text-align:center; width: 10%">Jam</th>
                                    <th style="text-align:center; width: 5%">Dinar</th>
                                    <th style="text-align:center; width: 5%">Liqo'</th>
                                    <th style="text-align:center; width: 20%">Options</th>
                                </tr>
                            </thead>
                            <tbody class="konten-data">
                                @php $no=1; @endphp
                                @foreach($data as $value)
                                    <tr>
                                        <td style="text-align:center; width: 5%">{{$no}}.</td>
                                        <td style="text-transform:uppercase; text-align:left; width: 15%">{{$value->nama}}</td>
                                        <td style="text-align:left; width: 15%">{{$value->nama_pengajar}}</td>
                                        <td style="text-align:left; width: 10%">{{$value->nama_griya}}</td>
                                        <td style="text-align:center; width: 5%">{{$value->jilid}}</td>
                                        <td style="text-align:center; width: 10%">{{$value->hari}}</td>
                                        <td style="text-align:center; width: 10%">{{$value->jam}}</td>
                                        <td style="text-align:center; width: 5%">
                                            @if($value->prog_dinar == "1")
                                                <i class="fa fa-check"></i>
                                            @else
                                                <i class="fa fa-times-circle"></i>
                                            @endif
                                        </td>
                                        <td style="text-align:center; width: 5%">
                                            @if($value->prog_liqo == "1")
                                                <i class="fa fa-check"></i>
                                            @else
                                                <i class="fa fa-times-circle"></i>
                                            @endif
                                        </td>
                                        <td style="text-align:center; width: 20%">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary">Action</button>
                                                <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                    <div class="dropdown-menu" role="menu">
                                                        <a class="dropdown-item" href="javascript:void(0)" onclick="openForm('{{$value->id_siswa}}', 'pembelajaran')">Input Pembelajaran</a>
                                                        
                                                        <a class="dropdown-item" href="javascript:void(0)" onclick="openForm('{{$value->id_siswa}}', 'dinar')">Dinar</a>
                                                                                     
                                                        <a class="dropdown-item" href="javascript:void(0)" onclick="openForm('{{$value->id_siswa}}', 'liqo')">Liqo'</a>
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

<div class="modal fade" id="modal-input">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Form Input</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <input type="hidden" id="jenis">
        <input type="hidden" id="id_santri">

        <form role="form" id="form-liqo">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="santri">Nama Santri</label>
                            <input type="text" class="form-control" id="santri-liqo" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="pengajar">Program Liqo'</label>
                            <select class="form-control" id="program-liqo">
                                <option value="0">Belum</option>
                                <option value="1">Sudah</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form role="form" id="form-dinar">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="santri">Nama Santri</label>
                            <input type="text" class="form-control" id="santri-dinar" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="pengajar">Program Dinar</label>
                            <select class="form-control" id="program-dinar">
                                <option value="0">Belum</option>
                                <option value="1">Sudah</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        
        <form role="form" id="form-pembelajaran">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="santri">Nama Santri</label>
                            <input type="text" class="form-control" id="santri-pembelajaran" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-10">
                        <div class="form-group">
                            <label for="pengajar">Nama Pengajar</label>
                            <span id="wrap-data-pengajar"></span>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-2 col-sm-2">
                        <div class="form-group">
                            <label for="jilid">Jilid</label>
                            <input type="text" class="form-control" id="jilid" placeholder="Jilid">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="griya">Griya</label>
                            <span id="wrap-data-griya"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="hari">Hari</label>
                            <input type="text" class="form-control" id="hari" placeholder="Senin, Selasa, Rabu...">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="jam">Jam</label>
                            <input type="text" class="form-control" id="jam" placeholder="08.00 - 09.00">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="submit()">Simpan</button>
    </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
    function openForm(id, type)
    {

        $('#modal-input').modal('show');

        $('#jenis').val(type)

        $('#id_santri').val(id)

        if(type == "pembelajaran")
        {
            $('#form-pembelajaran').show();

            $('#form-dinar').hide();
            
            $('#form-liqo').hide();

            loadGriya();

            loadPengajar();

            getNamaSantri(id, "pembelajaran");

            detailPembelajaran();
        }
        else if(type == "dinar")
        {
            $('#form-pembelajaran').hide();

            $('#form-dinar').show();

            $('#form-liqo').hide();

            getNamaSantri(id, "dinar");
        }
        else if(type == "liqo")
        {
            $('#form-pembelajaran').hide();

            $('#form-dinar').hide();

            $('#form-liqo').show();

            getNamaSantri(id, "liqo");
        }
        else
        {
            $('#form-pembelajaran').hide();
        }

    }

    function loadPengajar()
    {
        $('#wrap-data-pengajar').load('select/data-pengajar');
    }

    function loadGriya()
    {
        $('#wrap-data-griya').load('select/data-griya');
    }

    function getNamaSantri(id, type)
    {
        $.post('{{ URL::to('detail-santri')}}', {id, _token: '{{ csrf_token() }}'}, function(e) {

            $('#santri-'+type).val(e[0].nama)

        });
    }

    function submit()
    {
        var jenis = $('#jenis').val();

        if(jenis == "pembelajaran")
        {
            submitPembelajaran();
        }
        else if(jenis == "dinar")
        {
            submitDinar();
        }
        else if(jenis == "liqo")
        {
            submitLiqo();
        }
    }

    function submitLiqo()
    {
        var id_santri = $('#id_santri').val()

        var liqo = $('#program-liqo').val()

        $.post('{{ URL::to('submit/pembelajaran-liqo')}}', {id_santri, liqo, _token: '{{ csrf_token() }}'}, function(e) {

            toastr.success('Data Pembelajaran Berhasil Diupdate!', function() {
                window.location.reload(1);
            })

        });
    }

    function detailPembelajaran()
    {
        var id_santri = $('#id_santri').val()

        $.post('{{ URL::to('detail-pembelajaran')}}', {id_santri, _token: '{{ csrf_token() }}'}, function(e) {

            console.log(e[0].nama_pengajar)

            $('#jilid').val(e[0].jilid)

            $('#hari').val(e[0].hari)

            $('#jam').val(e[0].jam)

        });
    }

    function submitDinar()
    {
        var id_santri = $('#id_santri').val()

        var dinar = $('#program-dinar').val()

        $.post('{{ URL::to('submit/pembelajaran-dinar')}}', {id_santri, dinar, _token: '{{ csrf_token() }}'}, function(e) {

            toastr.success('Data Pembelajaran Berhasil Diupdate!', function() {
                window.location.reload(1);
            })

        });
    }

    function submitPembelajaran()
    {
        var id_santri = $('#id_santri').val()

        var id_griya = $('#griya').val()

        var id_pengajar = $('#pengajar').val()

        var jilid = $('#jilid').val();

        var hari = $('#hari').val();

        var jam = $('#jam').val();
        
        $.post('{{ URL::to('submit/pembelajaran')}}', {id_santri, id_griya, id_pengajar, jilid, hari, jam, _token: '{{ csrf_token() }}'}, function(e) {

            toastr.success('Data Pembelajaran Berhasil Diupdate!', function() {
                window.location.reload(1);
            })

        });
    }

    function loadData()
    {
        var filter = $('#filter').val()

        $('.konten-data').empty()

        $('.konten-data').load('konten-belajar?filter='+filter);
    }
</script>
@endsection