<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Siswa;

class SiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function add()
    {
        return view('template-parts.siswa.add', [
            'active' => 'add-santri'
        ]);
    }

    public function view()
    {
        $data = Siswa::orderBy('nama')->get();

        return view('template-parts.siswa.view', [
            
            'active' => 'data-santri',

            'data' => $data
        ]);
    }

    public function submit(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');

        Siswa::create([

            'nama' => $request->nama,
            
            'no_hp' => $request->no_hp,
            
            'tempat_lahir' => $request->tempat_lahir,

            'tanggal_lahir' => date("Y-m-d", strtotime($request->tanggal_lahir)),

            'profesi' => $request->profesi,

            'is_wali' => $request->wali_murid,

            'alamat' => $request->alamat,

            'registered_at' => date("Y-m-d", strtotime($request->registered_at)),

        ]);
    }

    public function detail(Request $request)
    {
        $data = Siswa::where('id', $request->id)->get();

        return $data;
    }
    
    public function remove(Request $request)
    {
        if($request)
        {
            Siswa::where('id', $request->id)->delete();
        }
    }

}
