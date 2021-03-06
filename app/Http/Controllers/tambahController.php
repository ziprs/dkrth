<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Session;
use App;

use App\Barang;
use App\Kegiatan;
use App\Gudang;
use App\Jenis;

class tambahController extends Controller
{
    public function tambah(){
        $kegiatan = Kegiatan::all();
        $gudang = Gudang::all();
        $jenis = Jenis::all();
        return view('admin.tambah',[
            "kegiatan"=>$kegiatan,
            "gudang"=>$gudang,
            "jenis"=>$jenis,
            ]);
    }

    public function edit($id){
        $aset = Barang::find($id);
        $kegiatan = Kegiatan::all();
        $gudang = Gudang::all();
        $jenis = Jenis::all();
        return view('admin.edit',[
            "kegiatan"=>$kegiatan,
            "gudang"=>$gudang,
            "jenis"=>$jenis,
            "aset"=>$aset,
            ]);
    }

    public function save(Request $request){
        $method = $request->method();
        if ($request->isMethod('post')) {
            $messages = [
                'required' => ':attribute harus di isi.',
                'max' => ':attribute tidak lebih dari :max'
            ];

            $rules = [
                'nama' => 'required|max:45',
                'jumlah' => 'required',
                'toko' => 'required|max:45',
                'harga' => 'required',
                'satuan' => 'required|max:5',
                'spek' => 'required|max:45',
                'tanggal' => 'required',
                'kegiatan' => 'required',
                'jenis' => 'required',
            ];

            $validator = Validator::make(request()->all(), $rules, $messages);

            if($validator->fails()){
                $data["status"] = false;
                $data["error"] = $validator->errors();
                return response()->json($data);
            }

            $barang = new Barang;
            $barang->nama = $request->nama;
            $barang->qty = $request->jumlah;
            $barang->toko = $request->toko;
            $barang->harga = $request->harga;
            $barang->spek = $request->spek;
            $barang->satuan = $request->satuan;
            $barang->tanggal = $request->tanggal;
            $barang->id_user = $request->session()->get('admin');
            $barang->id_kegiatan = $request->kegiatan;
            $barang->id_jenis = $request->jenis;
            $barang->id_gudang = $request->gudang;
            $barang->save();

            $data["status"] = true;
            if($request->jenis == 1){
                $data["isAsset"] = true;
            }
            Session::flash('success', 'Data Berhasil Di Tambah');
            return response()->json($data);
        }
    }

    public function saveEdit(Request $request){
        $method = $request->method();
        if ($request->isMethod('post')) {
            $messages = [
                'required' => ':attribute harus di isi.',
                'max' => ':attribute tidak lebih dari :max'
            ];

            $rules = [
                'nama' => 'required|max:45',
                'jumlah' => 'required',
                'toko' => 'required|max:45',
                'harga' => 'required',
                'satuan' => 'required|max:5',
                'spek' => 'required|max:45',
                'tanggal' => 'required',
                'kegiatan' => 'required',
                'jenis' => 'required',
            ];

            $validator = Validator::make(request()->all(), $rules, $messages);

            if($validator->fails()){
                $data["status"] = false;
                $data["error"] = $validator->errors();
                return response()->json($data);
            }

            $barang = Barang::find($request->id_barang);
            $barang->nama = $request->nama;
            $barang->qty = $request->jumlah;
            $barang->toko = $request->toko;
            $barang->harga = $request->harga;
            $barang->spek = $request->spek;
            $barang->satuan = $request->satuan;
            $barang->tanggal = $request->tanggal;
            $barang->id_kegiatan = $request->kegiatan;
            $barang->id_jenis = $request->jenis;
            $barang->id_gudang = $request->gudang;
            $barang->save();

            $data["status"] = true;
            Session::flash('success', 'Data Berhasil Di Simpan');
            return response()->json($data);
        }
    }

    public function masuk(Request $request){
        $barang = Barang::all();
        $roles = $request->session()->get('roles');
        return view('gudang.masuk',[
            "barang"=>$barang,
            "roles"=>$roles,
        ]);
    }

    public function gudang_setujui($id){
        $barang = Barang::find($id);            
        $barang->status_gudang = 1;
        $barang->save();
        return redirect('/gudang/masuk');
    }
}
