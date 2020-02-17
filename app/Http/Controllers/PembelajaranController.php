<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pembelajaran;

class PembelajaranController extends Controller
{
    public function view()
    {
        $pembelajaran = new Pembelajaran;

        $data = $pembelajaran->getDataPembelajaran("all");

        return view('template-parts.pembelajaran.view', [
            
            'active' => 'pembelajaran',

            'data' => $data
        ]);
    }

    public function pembelajaranTable(Request $request)
    {
        $pembelajaran = new Pembelajaran;

        $data = $pembelajaran->getDataPembelajaran($request->filter);
        
        $no = 1;

        foreach ($data as $value)
        {
            if($value->prog_dinar == "1")
            {
                $status_dinar = '<i class="fa fa-check"></i>';
            }    
            else
            {
                $status_dinar = '<i class="fa fa-times-circle"></i>';
            }

            if($value->prog_liqo == "1")
            {
                $status_liqo = '<i class="fa fa-check"></i>';
            }    
            else
            {
                $status_liqo = '<i class="fa fa-times-circle"></i>';
            }
            
            echo '
                <tr>
                    <td style="text-align:center; width: 5%">'.$no.'.</td>
                    <td style="text-transform:uppercase; text-align:left; width: 15%">'.$value->nama.'</td>
                    <td style="text-align:left; width: 15%">'.$value->nama_pengajar.'</td>
                    <td style="text-align:left; width: 10%">'.$value->nama_griya.'</td>
                    <td style="text-align:center; width: 5%">'.$value->jilid.'</td>
                    <td style="text-align:center; width: 10%">'.$value->hari.'</td>
                    <td style="text-align:center; width: 10%">'.$value->jam.'</td>
                    <td style="text-align:center; width: 5%">'.$status_dinar.'</td>
                    <td style="text-align:center; width: 5%">'.$status_liqo.'</td>
                    <td style="text-align:center; width: 20%">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary">Action</button>
                            <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                <span class="sr-only">Toggle Dropdown</span>
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item" href="javascript:void(0)" onclick="openForm(\''.$value->id_siswa.'\', \'pembelajaran\')">Input Pembelajaran</a>

                                    <a class="dropdown-item" href="javascript:void(0)" onclick="openForm(\''.$value->id_siswa.'\', \'dinar\')">Dinar</a>

                                    <a class="dropdown-item" href="javascript:void(0)" onclick="openForm(\''.$value->id_siswa.'\', \'liqo\')">Liqo</a>
                                </div>
                            </button>
                        </div>
                    </td>
                </tr>         
            ';
            $no++;
        }
    }

    public function submitDinar(Request $request)
    {
        if($request)
        {
            $pembelajaran = new Pembelajaran;

            $id_santri = $request->id_santri;

            $dinar = $request->dinar;

            $count = $pembelajaran->where('kode_siswa', $id_santri)->count();

            if($count == 0)
            {

                $pembelajaran->create([
                    
                    'kode_siswa' => $id_santri,
                    
                    'prog_dinar' => $dinar

                ]);

            }
            else
            {
                $pembelajaran->where('kode_siswa', $id_santri)->update([
                    
                    'prog_dinar' => $dinar

                ]);
            }
        }
    }

    public function detail(Request $request)
    {
        if($request)
        {
            $pembelajaran = new Pembelajaran;
            
            return $pembelajaran->getDetailPembelajaran($request->id_santri);
        }
    }

    public function submitLiqo(Request $request)
    {
        if($request)
        {
            $pembelajaran = new Pembelajaran;

            $id_santri = $request->id_santri;

            $liqo = $request->liqo;

            $count = $pembelajaran->where('kode_siswa', $id_santri)->count();

            if($count == 0)
            {

                $pembelajaran->create([
                    
                    'kode_siswa' => $id_santri,
                    
                    'prog_liqo' => $liqo

                ]);

            }
            else
            {
                $pembelajaran->where('kode_siswa', $id_santri)->update([
                    
                    'prog_liqo' => $liqo

                ]);
            }
        }
    }

    public function submit(Request $request)
    {
        if($request)
        {
            $pembelajaran = new Pembelajaran;

            $id_santri = $request->id_santri;

            $id_griya = $request->id_griya;

            $id_pengajar = $request->id_pengajar;

            $hari = strtoupper($request->hari);

            $jam = $request->jam;

            $jilid = $request->jilid;
            
            $count = $pembelajaran->where('kode_siswa', $id_santri)->count();

            if($count == 0)
            {

                $pembelajaran->create([
                    
                    'kode_siswa' => $id_santri,
                    
                    'kode_pengajar' => $id_pengajar,

                    'griya' => $id_griya,

                    'hari' => $hari,

                    'jam' => $jam,

                    'jilid' => $jilid

                ]);

            }
            else
            {
                $pembelajaran->where('kode_siswa', $id_santri)->update([
                    
                    'kode_pengajar' => $id_pengajar,

                    'griya' => $id_griya,

                    'hari' => $hari,

                    'jam' => $jam,

                    'jilid' => $jilid

                ]);
            }
        }
    }
}
