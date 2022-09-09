<?php

namespace App\Http\Controllers;

use App\Models\Pemenang;
use App\Models\Negara;
use App\Models\Medali;
use Illuminate\Http\Request;

class MedaliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pemenang = Pemenang::all();
        $datanegara = Negara::with('pemenang')->simplePaginate(5);
        // $data = Medali::with('negara')->paginate();
        return view('medali/datamedali', compact('datanegara'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datanegara = Negara::all();
        $data = Medali::with('negaras')->paginate();
        return view('medali/tambahmedali', compact(['data', 'datanegara']));
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
            'negara' => 'required|not_in:0',
            'emas' => 'required',
            'perak' => 'required',
            'perunggu' => 'required',

        ]);
        $data = Medali::create($request->all());
        return redirect()->route('medali')->with('success', 'Data Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medali  $medali
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Negara::findOrFail($id);
        $data = Medali::find($id);
        $datanegara = Negara::all();
        //dd($data);

        return view('medali/tampilmedali', compact(['datanegara', 'data']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medali  $medali
     * @return \Illuminate\Http\Response
     */
    public function edit(Medali $medali)
    {
        $datanegara = Medali::all();
        return view('updatedatamedali', compact('datamedali'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medali  $medali
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Medali::find($id);
        $data->update([
            'negara' => $request->negara,
            'emas' => $request->emas,
            'perak' => $request->perak,
            'perunggu' => $request->perunggu,
        ]);

        return redirect()->route('medali')->with('success', 'Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medali  $medali
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Medali::find($id);
        $data->delete($id);
        return redirect()->route('medali')->with('success', 'Data Berhasil Di Hapus');
    }
}
