<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kontak;
use File;


class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Siswa::all();
        return view('admin.MasterSiswa', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Siswa::all();
        return view('admin.TambahSiswa', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required'=>':attribute minimal diisi dong kak',
            'min'=>':attribute minimal :min karakter lah ya',
            'max'=>':attribute maksimal :max karakter dong',
            'mimes' => ':attribute harus diisi file jpg,jpeg,png'
        ];

        $this->validate($request,[
            'nama'=>'required|min:5|max:20',
            'jenis_kelamin'=>'required',
            'email'=>'required',
            'alamat'=>'required|min:5',
            'about'=>'required',
            'foto'=>'required|mimes:jpg,jpeg,png'
        ], $messages);
         

        // ambil informasi yang diiupload
        $file = $request->file('foto');

        // rename
        $nama_file = time()."_".$file->getClientOriginalName();

        //_aghna.jpg

        // proses upload
        $tujuan_upload = './template/img';
        $file->move($tujuan_upload, $nama_file);

        // proses insert Database
        Siswa::create([
            'nama'=> $request->nama,
            'jenis_kelamin'=>$request->jenis_kelamin,
            'email'=>$request->email,
            'alamat'=>$request->alamat,
            'about'=>$request->about,
            'foto'=>$nama_file
        ]);

        return redirect('/mastersiswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Siswa::find($id);
        $kontak = Siswa::find($id)->kontak;
        // dd($kontak);
        return view('admin.ShowSiswa', compact('data','kontak'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Siswa::find($id);
        return view('admin.EditSiswa', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'required'=>':attribute minimal diisi dong kak',
            'min'=>':attribute minimal :min karakter lah ya',
            'max'=>':attribute maksimal :max karakter dong',
            'mimes' => ':attribute harus diisi file jpg,jpeg,png'
        ];

        $this->validate($request,[
            'nama'=>'required|min:5|max:20',
            'jenis_kelamin'=>'required',
            'email'=>'required',
            'alamat'=>'required|min:5',
            'about'=>'required',
            'foto'=>'mimes:jpg,jpeg,png,gif,svg'
        ], $messages);

        if($request->foto != ''){
            // ganti foto

            // 1. hapus foto lama
            $siswa=Siswa::find($id);
            file::delete('./template/img'.$siswa->foto);
            // 2. ambil informasi yang diiupload
        $file = $request->file('foto');

        // 3. rename
        $nama_file = time()."_".$file->getClientOriginalName();

        //_aghna.jpg

        // 4. proses upload
        $tujuan_upload = './template/img';
        $file->move($tujuan_upload, $nama_file);

        // 5. menyimpan ke database
        $siswa->nama=$request->nama;
        $siswa->jenis_kelamin=$request->jenis_kelamin;
        $siswa->email=$request->email;
        $siswa->alamat=$request->alamat;
        $siswa->about=$request->about;
        $siswa->foto=$nama_file;
        $siswa->save();
        return redirect ('mastersiswa');

        }else{
            // tanpa ganti foto
            $siswa=Siswa::find($id);
            $siswa->nama=$request->nama;
            $siswa->jenis_kelamin=$request->jenis_kelamin;
            $siswa->email=$request->email;
            $siswa->alamat=$request->alamat;
            $siswa->about=$request->about;
            $siswa->save();
            return redirect ('mastersiswa');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapus($id)
    {

        $data = Siswa::destroy($id);
        return redirect ('mastersiswa');
    }
}
