<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use Illuminate\Http\Request;

class MhsAPIController extends Controller
{
    public function read(){
        $mhs = Mahasiswa::all();
        return response()->json([
            "success" => true,
            "message" => "Data Berhasil Ditampilkan",
            "data" => $mhs
        ], 200);
    }
    public function create(Request $request){
    //    $minat = implode(',', $request->get('minat'));
        $mhs = Mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'gender' => $request->gender,
            'prodi' => $request->prodi,
            'minat' => $request -> minat
        ]);
        if($mhs){
        return response()->json([
            "success" => true,
            "message" => "Data Berhasil Ditambahkan",
        ], 200);

        }else {
        return response()->json([
            "success" => false,
            "message" => "Data Gagal Ditambahkan",
        ], 400);
    }
    
}
    public function update($nim, Request $request){
        $mhs =  Mahasiswa::find($nim)->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'gender' => $request->gender,
            'prodi' => $request->prodi,
            'minat' => $request -> minat
        ]);   
        if($mhs){
            return response()->json([
                "success" => true,
                "message" => "Data Berhasil Diubah",
            ], 200);
    
            }else {
            return response()->json([
                "success" => false,
                "message" => "Data Gagal Diubah",
            ], 400);
        }
    }
    public function delete($nim){
        $mhs = Mahasiswa::find($nim)->delete();
        if($mhs){
            return response()->json([
                "success" => true,
                "message" => "Data Berhasil Dihapus",          
            ], 200 );
            
            }else {
            return response()->json([
                "success" => false,
                "message" => "Data Gagal Dihapus",
            ], 400);
        }
    }
    }

