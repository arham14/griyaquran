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
                        <h3 class="card-title">Tambah Data Quran</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama">Nama Griya</label>
                                <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Griya..">
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="button" onclick="submitGriya()" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function submitGriya()
    {
        var nama_griya = $('#nama').val()

        $.post('{{ URL::to('submit/griya')}}', {nama_griya, _token: '{{ csrf_token() }}'}, function(e) {

            $('#nama').val("")

            toastr.success('Data Griya Berhasil Ditambahkan!')

        });
    }

</script>
@endsection