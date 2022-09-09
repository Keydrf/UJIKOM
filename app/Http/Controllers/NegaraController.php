<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Negara;
use App\Models\Olimpiade;
use Illuminate\Http\Request;

class NegaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Negara::simplePaginate(5);
        return view('negara/datanegara', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('negara/tambahnegara');
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
            'nama' => 'required',
        ]);
        $data = Negara::create($request->all());
        return redirect()->route('datanegara')->with('success', 'Data Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Negara  $negara
     * @return \Illuminate\Http\Response
     */
    public function tampilnegara($id)
    {
        $data = Negara::findOrFail($id);
        $data = Negara::find($id);
        //dd($data);

        return view('negara/tampilnegara', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Negara  $negara
     * @return \Illuminate\Http\Response
     */

    public function updatedatanegara(Request $request, $id)
    {
        $data = Negara::find($id);
        $data->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('datanegara')->with('success', 'Data Berhasil Di Update');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Negara  $negara
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Negara $negara)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Negara  $negara
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $count = Olimpiade::where('id_negara', $id)->count();
        if ($count > 0) {
            return back()->with('gagal', 'Negara masih digunakan!');
        }

        $data = Negara::findorfail($id);
        $data->delete();
        return back()->with('info', 'Data berhasil dihapus');
    }



    // public function trash()
    // {
    //     // menampil data guru yang sudah dihapus
    //     $data = Negara::onlyTrashed()->get();
    //     return view('negara/negara_trash', ['negara' => $data]);
    // }

    // public function kembali($id)
    // {
    //     $data = Negara::onlyTrashed()->where('id',$id);
    //     $data->restore();
    //     return redirect()->route('negaratrash')->with('success', 'Data Berhasil Di Hapus');
    // }

    // public function permanen($id)
    // {
    //     $data = Negara::onlyTrashed()->where('id', $id);
    //     $data->forceDelete();
    //     return redirect('negara/trash');
    // }
}
