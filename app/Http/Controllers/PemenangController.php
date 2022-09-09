<?php

namespace App\Http\Controllers;

use App\Models\Negara;
use App\Models\Olimpiade;
use App\Models\Pemenang;
use App\Models\CabangOlahraga;
use Illuminate\Http\Request;

class PemenangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pemenang::with('negara', 'cabangolahraga')->Paginate(10);

        $datacabang = CabangOlahraga::all();

        return view('pemenang/datapemenang', compact(['data', 'datacabang']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $datanegara = Negara::all();
        $datanama = Olimpiade::all();
        $datacabang = CabangOlahraga::all();
        $data = Pemenang::with('negara', 'cabangolahraga')->paginate();
        return view('pemenang/tambahpemenang', compact(['data', 'datanegara', 'datanama', 'datacabang']));
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
            'id_nama' => 'required|not_in:0',
            'id_cabangolahraga' => 'required',
            'medali' => 'required',
            'id_negara' => 'required|not_in:0',
        ]);
        $data = Pemenang::create($request->all());
        $datacabang = CabangOlahraga::all();

        return redirect()->route('pemenang')->with('success', 'Data Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemenang  $pemenang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Pemenang::with('cabangolahraga')->findOrFail($id);
        // $data = Pemenang::find($id);
        $datanegara = Negara::all();
        $datacabang = CabangOlahraga::all();
        $datanama = Olimpiade::all();

        return view('pemenang/tampilpemenang', compact(['datanegara', 'datanama', 'data', 'datacabang']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemenang  $pemenang
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemenang $pemenang)
    {
        $datanegara = Pemenang::all();
        $datacabang = CabangOlahraga::all();
        return view('updatedatapemenang', compact('data', 'datacabang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemenang  $pemenang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Pemenang::find($id);
        $data->update([
            'id_nama' => $request->id_nama,
            'id_cabangolahraga' => $request->id_cabangolahraga,
            'medali' => $request->medali,
            'id_negara' => $request->id_negara,
        ]);

        return redirect()->route('pemenang')->with('success', 'Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemenang  $pemenang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pemenang::find($id);
        $data->delete();
        return redirect()->route('pemenang')->with('success', 'Data Berhasil Di Hapus');
    }
}
