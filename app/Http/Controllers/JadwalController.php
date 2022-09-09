<?php

namespace App\Http\Controllers;

use App\Models\Negara;
use App\Models\Jadwal;
use App\Models\CabangOlahraga;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Jadwal::with('negara1', 'negara2', 'cabangolahraga')->Paginate(10);
        
        $datanegara = Negara::all();
        $datacabang = CabangOlahraga::all();
        return view('jadwal/datajadwal', compact(['data', 'datacabang', 'datanegara']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datanegara = Negara::all();
        $data = Jadwal::with('negaras', 'cabangolahraga');
        $datacabang = CabangOlahraga::all();
        return view('jadwal/tambahjadwal', compact(['data', 'datanegara', 'datacabang']));;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_negara1' => 'required|not_in:0',
            'id_negara2' => 'required|not_in:0',
            'id_cabangolahraga' => 'required',
            'tanggal' => 'required',
        ]);
        $data = Jadwal::create($request->all());
        return redirect()->route('jadwal')->with('success', 'Data Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Jadwal::with('cabangolahraga')->findOrFail($id);
        // $data = Jadwal::find($id);
        $datanegara = Negara::all();
        $datacabang = CabangOlahraga::all();

        return view('jadwal/tampiljadwal', compact(['data', 'datanegara', 'datacabang']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwal $jadwal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Jadwal::find($id);
        $data->update([
            'id_cabangolahraga' => $request->id_cabangolahraga,
            'tanggal' => $request->tanggal,
            'id_negara1' => $request->id_negara1,
            'id_negara2' => $request->id_negara2,

        ]);
        return redirect()->route('jadwal')->with('success', 'Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Jadwal::find($id);
        $data->delete($id);
        return redirect()->route('jadwal')->with('success', 'Data Berhasil Di Hapus');
    }
}
