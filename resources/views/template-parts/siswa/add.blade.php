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
                        <h3 class="card-title">Tambah Data Santri</h3>
                    </div>
                    <form role="form">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="nama">Nama Santri</label>
                                        <input type="text" class="form-control" id="nama" placeholder="Nama Santri...">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="nama">No HP</label>
                                        <input type="text" class="form-control" id="no_hp" placeholder="Nomor HP Santri...">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="form-group">
                                        <label for="nama">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir Santri...">
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-2">
                                    <div class="form-group">
                                        <label for="nama">Tanggal Lahir</label>
                                        <input type="text" class="form-control" id="tanggal_lahir" placeholder="14-10-1990">
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="form-group">
                                        <label for="nama">Profesi</label>
                                        <input type="text" class="form-control" id="profesi" placeholder="Profesi...">
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-2">
                                    <div class="form-group">
                                        <label for="wali_murid">Wali Murid?</label>
                                        <select id="wali_murid" class="form-control">
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-2">
                                    <div class="form-group">
                                        <label for="registerd_at">Mulai Masuk</label>
                                        <input type="text" id="registerd_at" class="form-control" placeholder="31-01-2019">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="nama">Alamat Santri</label>
                                        <textarea rows="3" class="form-control" id="alamat" placeholder="Alamat Santri..."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="button" onclick="submitPengajar()" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function submitPengajar()
    {
        var wali_murid = $('#wali_murid').val();
        
        var nama = $('#nama').val();

        var no_hp = $('#no_hp').val();

        var tempat_lahir = $('#tempat_lahir').val();

        var tanggal_lahir = $('#tanggal_lahir').val();

        var profesi = $('#profesi').val();

        var registered_at = $('#registered_at').val();

        var alamat = $('#alamat').val();

        $.post('{{ URL::to('submit/siswa')}}', {nama, no_hp, tempat_lahir, tanggal_lahir, profesi, wali_murid, alamat, registered_at, _token: '{{ csrf_token() }}'}, function(e) {

            $('#nama').val("")

            $('#no_hp').val("")

            $('#tempat_lahir').val("")

            $('#tanggal_lahir').val("")

            $('#profesi').val("")

            $('#alamat').val("")

            $('#registered_at').val("")

            toastr.success('Data Santri Berhasil Ditambahkan!')

        });
        
    }

</script>
@endsection