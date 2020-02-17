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
                        <h3 class="card-title">Tambah Data Pengajar</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="nama">Nama Pengajar</label>
                                        <input type="text" class="form-control" id="nama" placeholder="Nama Pengajar...">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="nama">No HP</label>
                                        <input type="text" class="form-control" id="no_hp" placeholder="Nomor HP Pengajar...">
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
        var nama = $('#nama').val()
        
        var no_hp = $('#no_hp').val()
        
        var alamat = $('#alamat').val()

        if(nama != "" && no_hp != "" && alamat != "")
        {
            $.post('{{ URL::to('submit/pengajar')}}', {nama, no_hp, alamat, _token: '{{ csrf_token() }}'}, function(e) {

                $('#nama').val("")

                $("#nama").removeClass("is-invalid");

                $('#no_hp').val("")

                $("#no_hp").removeClass("is-invalid");

                $('#alamat').val("")

                $("#alamat").removeClass("is-invalid");

                toastr.success('Data Pengajar Berhasil Ditambahkan!')

            });
        }
        else
        {
            if(nama == "")
            {
                $("#nama").addClass("is-invalid");
            }
            else
            {
                $("#nama").removeClass("is-invalid");
            }

            if(no_hp == "")
            {
                $("#no_hp").addClass("is-invalid");
            }
            else
            {
                $("#no_hp").removeClass("is-invalid");
            }
            
            if(alamat == "")
            {
                $("#alamat").addClass("is-invalid");
            }
            else
            {
                $("#alamat").removeClass("is-invalid");
            }
        }
        
    }

</script>
@endsection