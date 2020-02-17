<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Griya;

class GriyaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view()
    {

        $data = Griya::orderBy('nama', 'desc')->get();
        
        return view('template-parts.griya.view', [
            
            'active' => 'data-griya',

            'data' => $data
            
        ]);
    }

    public function add()
    {
        return view('template-parts.griya.add', [
            
            'active' => 'add-griya'

        ]);
    }

    public function submit(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');

        $nama = $request->nama_griya;
        
        Griya::create([

            'nama' => $nama

        ]);
    }

    public function remove(Request $request)
    {
        if($request)
        {
            Griya::where('id', $request->id)->delete();
        }
    }

    public function detail(Request $request)
    {
        if($request)
        {
            $data = Griya::where('id', $request->id)->get();

            return $data;
        }
    }

    public function update(Request $request)
    {
        if($request)
        {
            Griya::where('id', $request->id)->update([
                
                'nama' => $request->nama

            ]);
        }
    }

    public function dataGriyaSelect()
    {
        $data = Griya::orderBy('nama')->get();

        echo '<select class="form-control" id="griya">';

        foreach ($data as $value)
        {
            echo '<option value=" '.$value->id.' "> '.$value->nama.' </option>';    
        }

        echo '</select>';

    }
}
