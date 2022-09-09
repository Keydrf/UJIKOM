<?php

namespace App\Http\Controllers;

use App\Models\Tuanrumah;
use App\Models\Negara;
use Illuminate\Http\Request;

class TuanrumahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datanegara = Negara::all();
        $data = Tuanrumah::with('negara')->Paginate(10);
        return view('tuanrumah/datatuanrumah', compact(['data', 'datanegara']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambahtuan()
    {
        $datanegara = Negara::all();
        $data = Tuanrumah::with('negaras')->paginate();
        return view('tuanrumah/tambahtuan', compact(['data', 'datanegara']));;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { {
            $this->validate($request, [
                'edisi' => 'required',
                'id_tuanrumah' => 'required|not_in:0',
                'kota' => 'required',
                'tanggal' => 'required',
                'foto' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            ]);

            if ($request->hasFile('foto')) {
                $request->file('foto')->move('fototuanrumah/', $request->file('foto')->getClientOriginalName());
                $data = Tuanrumah::create([
                    'edisi' => $request->edisi,
                    'id_tuanrumah' => $request->id_tuanrumah,
                    'kota' => $request->kota,
                    'tanggal' => $request->tanggal,
                    'foto' => $request->file('foto')->getClientOriginalName(),
                ]);
            } else {
                $data = Tuanrumah::create([
                    'edisi' => $request->edisi,
                    'id_tuanrumah' => $request->id_tuanrumah,
                    'kota' => $request->kota,
                    'tanggal' => $request->tanggal,
                ]);
            }
            return redirect()->route('tuanrumah')->with('success', 'Data Berhasil Di Tambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tuanrumah  $tuanrumah
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Tuanrumah::findOrFail($id);
        $datanegara = Negara::all();
        $data = Tuanrumah::find($id);
        //dd($data);

        return view('tuanrumah/tampiltuan', compact(['data', 'datanegara']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tuanrumah  $tuanrumah
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datanegara = Tuanrumah::all();
        return view('update', compact('datanegara'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tuanrumah  $tuanrumah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Tuanrumah::find($id);



        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fototuanrumah/', $request->file('foto')->getClientOriginalName());
            $namafoto = $request->file('foto')->getClientOriginalName();
            $data->update([
                'foto' => $namafoto,
                'edisi' => $request->edisi,
                'tuanrumah' => $request->tuanrumah,
                'kota' => $request->kota,
                'tanggal' => $request->tanggal,
            ]);
        } else {
            $data->update([
                //'foto' => request->foto
                'edisi' => $request->edisi,
                'tuanrumah' => $request->tuanrumah,
                'kota' => $request->kota,
                'tanggal' => $request->tanggal,
            ]);
        }

        return redirect()->route('tuanrumah')->with('success', 'Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tuanrumah  $tuanrumah
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Tuanrumah::find($id);
        $data->delete();
        return redirect()->route('tuanrumah')->with('success', 'Data Berhasil Di Hapus');
    }
}
