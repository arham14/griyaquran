<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pengajar;

class PengajarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view()
    {
        $data = Pengajar::orderBy('nama')->get();

        return view('template-parts.pengajar.view', [
            
            'active' => 'data-pengajar',

            'data' => $data
        ]);
    }

    public function add()
    {
        return view('template-parts.pengajar.add', [
            
            'active' => 'add-pengajar'

        ]);
    }

    public function submit(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');

        Pengajar::create([

            'nama' => $request->nama,

            'no_hp' => $request->no_hp,

            'alamat' => $request->alamat,

        ]);
    }

    public function dataPengajarSelect()
    {
        $data = Pengajar::orderBy('nama')->get();

        echo '<select class="form-control" id="pengajar">';

        foreach ($data as $value)
        {
            echo '<option id="'.$value->nama.'" value=" '.$value->id.' "> '.$value->nama.' </option>';    
        }

        echo '</select>';

    }

    public function remove(Request $request)
    {
        if($request)
        {
            Pengajar::where('id', $request->id)->delete();
        }
    }

    public function detail(Request $request)
    {
        if($request)
        {
            $data = Pengajar::where('id', $request->id)->get();

            return $data;
        }
    }

    public function update(Request $request)
    {
        if($request)
        {
            Pengajar::where('id', $request->id)->update([

                'nama' => $request->nama,
    
                'no_hp' => $request->no_hp,
    
                'alamat' => $request->alamat,
    
            ]);
        }
    }
}
