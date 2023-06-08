<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;

class PageController extends Controller
{
    public function home()
    {
        return view('home', ['key' => 'home']);
    }
    public function profile()
    {
        return view('profile', ['key' => 'profile']);
    }
    public function mahasiswa()
    {
        $mhs = Mahasiswa::paginate(10);
        return view('mahasiswa', ['key' => 'mahasiswa', 'mhs' => $mhs]);
    }

    public function contact()
    {
        return view('contact', ['key' => 'contact']);
    }

    public function cari(Request $request)
    {
        $cari = $request->q;
        $mhs = Mahasiswa::where('nama', 'like', '%' . $cari . '%')->paginate(5);
        $mhs->appends($request->all());
        return view('mahasiswa', ['key' => 'Mahasiswa', 'mhs' => $mhs]);
    }
    public function tambah()
    {
        return view('formtambah', ['key' => 'Mahasiswa']);
    }
    public function simpan(Request $request)
    {
        $minat = implode(',', $request->get('minat'));
        Mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'gender' => $request->gender,
            'prodi' => $request->prodi,
            'minat' => $minat
        ]);
        return redirect('mahasiswa')->with('success', 'Data berhasil disimpan!');
    }
    public function urutkanNimAsc()
    {
        $mhs = Mahasiswa::orderBy('nim', 'asc')->paginate(10);
        return view('mahasiswa', ['key' => 'mahasiswa', 'mhs' => $mhs]);
    }
    public function urutkanNamaAsc()
    {
        $mhs = Mahasiswa::orderBy('nama', 'asc')->paginate(10);
        return view('mahasiswa', ['key' => 'mahasiswa', 'mhs' => $mhs]);
    }

    public function urutkanNimDesc()
    {
        $mhs = Mahasiswa::orderBy('nim', 'desc')->paginate(10);
        return view('mahasiswa', ['key' => 'mahasiswa', 'mhs' => $mhs]);
    }

    public function edit($nim)
    {
        $mhs = Mahasiswa::find($nim);
        return view('formedit', ['key' => 'mahasiswa','mhs' => $mhs]);
    }
    public function update($nim, Request $request)
    {
        $mhs =  Mahasiswa::find($nim);
        $minat = implode(',', $request->minat);
        $mhs ->nim = $request->nim;
        $mhs ->nama = $request->nama;
        $mhs ->gender= $request->gender;
        $mhs ->prodi = $request->prodi;
        $mhs ->minat = $minat;  
        $mhs ->save();

        return redirect('mahasiswa')->with('success', 'Data berhasil disimpan!');
        
    }
    public function delete ($nim)
    {
        $mhs = Mahasiswa::find($nim);
        $mhs->delete();

        return redirect('mahasiswa')->with('success', 'Data berhasil dihapus!');
    }
    public function destroy ($nim)
    {
        $mhs = Mahasiswa::find($nim);
        return view('mahasiswa.delete', ['mhs' => $mhs]);
    }

}