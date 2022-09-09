<?php

namespace App\Http\Controllers;

use App\Models\Olimpiade;
use App\Models\Pemenang;
use App\Models\CabangOlahraga;
use Illuminate\Http\Request;

class CabangOlahragaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CabangOlahraga::paginate();
        return view('cabangolahraga/datacabang', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cabangolahraga/tambahcabang');
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
            'cabangolahraga' => 'required|max:255',
        ]);
        $data = CabangOlahraga::create($request->all());
        return redirect()->route('cabang')->with('success', 'Data Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CabangOlahraga  $cabangOlahraga
     * @return \Illuminate\Http\Response
     */
    public function show(CabangOlahraga $cabangOlahraga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CabangOlahraga  $cabangOlahraga
     * @return \Illuminate\Http\Response
     */
    public function edit(CabangOlahraga $cabangOlahraga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CabangOlahraga  $cabangOlahraga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CabangOlahraga $cabangOlahraga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CabangOlahraga  $cabangOlahraga
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $count = Olimpiade::where('id_olimpiade', $id)->count();
        
        if ($count > 0) {
            return back()->with('gagal', 'Cabang olahraga masih digunakan!');
        }

        $data = CabangOlahraga::findorfail($id);
        $data->delete();
        return back()->with('info', 'Data berhasil dihapus');
    }
}
