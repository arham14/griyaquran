<?php

namespace App;

use DB;

use Illuminate\Database\Eloquent\Model;

class Pembelajaran extends Model
{
    protected $table = 'pembelajaran';

    protected $fillable = [

        'kode_siswa', 'kode_pengajar', 'griya', 'hari', 'jam', 'jilid', 'prog_dinar', 'prog_liqo', 

    ];

    public function getDataPembelajaran($filter)
    {
        if($filter == "liqo")
        {
            $data = DB::SELECT('SELECT
                siswa.nama as nama,
                siswa.id as id_siswa,
                IFNULL(pengajar.nama, \'-\') as nama_pengajar,
                IFNULL(griya.nama, \'-\') as nama_griya,
                IFNULL(pembelajaran.jilid, \'-\') as jilid,
                IFNULL(pembelajaran.hari, \'-\') as hari,
                IFNULL(pembelajaran.jam, \'-\') as jam,
                IFNULL(pembelajaran.prog_dinar, \'-\') as prog_dinar,
                IFNULL(pembelajaran.prog_liqo, \'-\') as prog_liqo
                FROM siswa
                LEFT OUTER JOIN pembelajaran ON siswa.id=pembelajaran.kode_siswa
                LEFT OUTER JOIN pengajar ON pembelajaran.kode_pengajar=pengajar.id
                LEFT OUTER JOIN griya ON pembelajaran.griya=griya.id
                WHERE pembelajaran.prog_liqo=\'1\'
                ORDER BY siswa.nama
            ');
        }
        else if($filter == "dinar")
        {
            $data = DB::SELECT('SELECT
                siswa.nama as nama,
                siswa.id as id_siswa,
                IFNULL(pengajar.nama, \'-\') as nama_pengajar,
                IFNULL(griya.nama, \'-\') as nama_griya,
                IFNULL(pembelajaran.jilid, \'-\') as jilid,
                IFNULL(pembelajaran.hari, \'-\') as hari,
                IFNULL(pembelajaran.jam, \'-\') as jam,
                IFNULL(pembelajaran.prog_dinar, \'-\') as prog_dinar,
                IFNULL(pembelajaran.prog_liqo, \'-\') as prog_liqo
                FROM siswa
                LEFT OUTER JOIN pembelajaran ON siswa.id=pembelajaran.kode_siswa
                LEFT OUTER JOIN pengajar ON pembelajaran.kode_pengajar=pengajar.id
                LEFT OUTER JOIN griya ON pembelajaran.griya=griya.id
                WHERE pembelajaran.prog_dinar=\'1\'
                ORDER BY siswa.nama
            ');
        }
        else
        {
            $data = DB::SELECT('SELECT
                siswa.nama as nama,
                siswa.id as id_siswa,
                IFNULL(pengajar.nama, \'-\') as nama_pengajar,
                IFNULL(griya.nama, \'-\') as nama_griya,
                IFNULL(pembelajaran.jilid, \'-\') as jilid,
                IFNULL(pembelajaran.hari, \'-\') as hari,
                IFNULL(pembelajaran.jam, \'-\') as jam,
                IFNULL(pembelajaran.prog_dinar, \'-\') as prog_dinar,
                IFNULL(pembelajaran.prog_liqo, \'-\') as prog_liqo
                FROM siswa
                LEFT OUTER JOIN pembelajaran ON siswa.id=pembelajaran.kode_siswa
                LEFT OUTER JOIN pengajar ON pembelajaran.kode_pengajar=pengajar.id
                LEFT OUTER JOIN griya ON pembelajaran.griya=griya.id
                ORDER BY siswa.nama
            ');
        }
        

        return $data;
    }

    public function getDetailPembelajaran($id_siswa)
    {
        $data = DB::SELECT('SELECT
            siswa.nama as nama,
            siswa.id as id_siswa,
            IFNULL(pengajar.nama, \'-\') as nama_pengajar,
            IFNULL(pengajar.id, \'-\') as id_pengajar,
            IFNULL(griya.nama, \'-\') as nama_griya,
            IFNULL(pembelajaran.jilid, \'-\') as jilid,
            IFNULL(pembelajaran.hari, \'-\') as hari,
            IFNULL(pembelajaran.jam, \'-\') as jam,
            IFNULL(pembelajaran.prog_dinar, \'-\') as prog_dinar,
            IFNULL(pembelajaran.prog_liqo, \'-\') as prog_liqo
            FROM siswa
            LEFT OUTER JOIN pembelajaran ON siswa.id=pembelajaran.kode_siswa
            LEFT OUTER JOIN pengajar ON pembelajaran.kode_pengajar=pengajar.id
            LEFT OUTER JOIN griya ON pembelajaran.griya=griya.id
            WHERE siswa.id like \''.$id_siswa.'\'
        ');

        return $data;
    }
}
