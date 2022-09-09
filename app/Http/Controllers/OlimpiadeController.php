<?php

namespace App\Http\Controllers;

use App\Models\CabangOlahraga;
use App\Models\Negara;
use App\Models\Olimpiade;
use Illuminate\Http\Request;


class OlimpiadeController extends Controller
{
    public function index(Request $request)
    {
        $peserta = Olimpiade::with('negara', 'cabangolahraga')->Paginate(10);
        $datacabang = CabangOlahraga::all();
        $datanegara = Negara::all();
        $data = Olimpiade::all();
        return view('olimpiade/dataolimpiade', compact('peserta', 'datanegara', 'datacabang'));
    }
    public function tambahpeserta()
    {
        $datanegara = Negara::all();
        $datacabang = CabangOlahraga::all();
        return view('olimpiade/tambahdata', compact(['datacabang', 'datanegara']));
    }
    public function tambahdata()
    {
        $datanegara = Negara::all();
        $datacabang = CabangOlahraga::all();
        return view('olimpiade/tambahdata', compact(['datacabang', 'datanegara']));
    }

    public function insertdata(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|max:255',
            'jenis_kelamin' => 'required',
            'id_olimpiade' => 'required',
            'id_negara' => 'required|not_in:0',
            'foto' =>
            'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
        ]);
        // $olimpiade_awal = implode(', ', $request->olimpiade);
        // dd(explode(', ', $olimpiade_awal));
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotopeserta/', $request->file('foto')->getClientOriginalName());
            $data = Olimpiade::create([
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'id_olimpiade' => implode(', ', $request->id_olimpiade),
                'id_negara' => $request->id_negara,
                'foto' => $request->file('foto')->getClientOriginalName(),
            ]);
        } else {
            $data = Olimpiade::create([
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'id_olimpiade' => implode(', ', $request->id_olimpiade),
                'id_negara' => $request->id_negara,
            ]);
        }
        return redirect()->route('olimpiade')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function tampilkandata($id)
    {
        $data = Olimpiade::with('cabangolahraga')->findOrFail($id);

        $datanegara = Negara::all();
        $datacabang = CabangOlahraga::all();
        //dd($data);

        return view('olimpiade/tampildata', compact(['data', 'datanegara', 'datacabang']));
    }


    public function updatepeserta()
    {
        $datanegara = Negara::all();
        $datacabang = CabangOlahraga::all();
        return view('updatedata', compact(['datanegara', 'datacabang']));
    }


    public function updatedata(Request $request, $id)
    {

        $data = Olimpiade::find($id);



        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotopeserta/', $request->file('foto')->getClientOriginalName());
            $namafoto = $request->file('foto')->getClientOriginalName();
            $data->update([
                'foto' => $namafoto,
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'id_olimpiade' => implode(', ', $request->id_olimpiade),
                'id_negara' => $request->id_negara,
            ]);
        } else {
            $data->update([
                //'foto' => request->foto
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'id_olimpiade' => implode(', ', $request->id_olimpiade),
                'id_negara' => $request->id_negara,
            ]);
        }

        return redirect()->route('olimpiade')->with('success', 'Data Berhasil Di Update');
    }


    public function delete($id)
    {
        $data = Olimpiade::find($id);
        $data->delete();
        return redirect()->route('olimpiade')->with('success', 'Data Berhasil Di Hapus');
    }
}
