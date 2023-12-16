<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TopupNominals;
use App\Charts\JenisKelaminChart;
use App\Http\Controllers\Controller;
use App\Charts\TopupChart;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,JenisKelaminChart $jenisKelaminChart,TopupChart $topupChart)
    {
        $data['jenisKelaminChart'] = $jenisKelaminChart->build();
        $game['topupChart'] = $topupChart->build();
        $nominals = TopupNominals::paginate(6);

        return view('admin.index',compact('nominals', 'data','game'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $games = [
            ['game_id' => 1, 'name' => 'Genshin Impact'],
            ['game_id' => 2, 'name' => 'Honkai Star Rail'],
            ['game_id' => 3, 'name' => 'Mobile Legends'],
            ['game_id' => 4, 'name' => 'Clash Of Clans'],
        ];

        return view('admin.create',compact('games'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'game_id' => 'required|numeric',
            'nama_nominal' => 'required|string:255',
            'nominal' => 'required|numeric',
        ];

        $validatedData = $request->validate($rules);

        $nominals = new TopupNominals();

        $nominals->game_id = $request->input('game_id');
        $nominals->nama_nominal = $request->input('nama_nominal');
        $nominals->nominal = $request->input('nominal');

        $nominals->save();
        
        return redirect('/admin')->with('success', 'Data Berhasil Ditambah');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        $data = TopupNominals::findOrFail($id);

        $data->nama_nominal = $request->nama_nominal;
        $data->nominal = $request->nominal;
        $data->updated_at = now();
        $data->save();

        return redirect('/admin')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id)
    {
        $data = TopupNominals::find($id);

        if ($data) {
            return view('admin.update', ['data' => $data]);
        } else {
            return redirect('/admin');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function delete($id){
        if($data = TopupNominals::find($id)){
            $data->delete();
        }else{
            return redirect('admin')->with('failed','Data Gagal Dihapus');
        }

        return redirect('admin')->with('success','Data Berhasil Dihapus');
    }
}
