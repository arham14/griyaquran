<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';

    protected $fillable = [

        'nama', 'tempat_lahir', 'tanggal_lahir',  'alamat', 'profesi', 'is_wali', 'no_hp', 'registered_at'

    ];
}
