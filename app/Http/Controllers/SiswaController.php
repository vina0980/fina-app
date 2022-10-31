<?php

namespace App\Http\Controllers;
use App\Models\siswa;
use file;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = siswa::all();
        return view('admin.mastersiswa', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambahsiswa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message=[
            'required' => ':attribute harus diisi terlebih dahulu',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maksimal :max karakter',
            'mimes' => 'file :min attribute harus bertipe jpg, jpeg, png',
            'size' => 'file yang diuploud maksimal :size'

        ]; 
        $this->validate($request,[
            'nama' => 'required|min:5|max:20',
            'jk' => 'required',
            'email' => 'required',
            'alamat' => 'required|min:5',
            'about' => 'required|min:10'
        ], $message);

        //ambil informasi yang diupload
        $file = $request->file('foto');

        //rename + ambil nama file
        $nama_file = time()."_".$file->getClientOriginalName();

        //proses upload
        $tujuan_upload = './template/img';
        $file->move($tujuan_upload,$nama_file);

        //proses insert database
        siswa::create([
            'nama' => $request->nama,
            'jk' => $request->jk,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'about' => $request->about,
            'foto' => $nama_file
        ]);

        return redirect('/admin/mastersiswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = siswa::find($id);
        // $contact = $data->contact()->get();
        // return ($contact);

        return view('admin/showsiswa', compact('data'));
        // return view('admin/tampilsiswa');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=siswa::find($id);
        return view('admin/editsiswa', compact('data'));
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

        $siswa = siswa::find('id');

        $massages = [
            'required' => ':attribute ini harus diisi',
            'mimes' => ':attribute haruus bertipe jpg/png/jpeg'
        ];

        $this->validate($request,[
            'nama' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'foto' => 'mimes:jpg,png,jpeg'
        ],$massages);

        if($request->foto !=''){
            $siswa - siswa::find($id);

            // ambil file
            $file = $request->file('foto');
            // edit nama file 
            $nama_file = time()."_".$file->getClientOriginalName();
            // proses upload
            $tujuan_upload = './image';
            $file->move($tujuan_upload,$nama_file);

            // ganti foto
            $siswa = siswa::find($id);
            $siswa->nama = $request->nama;
            $siswa->email = $request->email;
            $siswa->alamat = $request->alamat;
            $siswa->about = $request->about;
            $siswa->jenis_kelamin = $request->jenis_kelamin;
            $siswa->foto = $nama_file;
            $siswa->save();
            return redirect('/admin/mastersiswa')->width('pesan', 'data berhasil diubah!');

        }else{
            // tanpa ganti foto
            $siswa = siswa::find($id);
            $siswa->nama = $request->nama;
            $siswa->email = $request->email;
            $siswa->alamat = $request->alamat;
            $siswa->about = $request->about;
            $siswa->jenis_kelamin = $request->jenis_kelamin;
            $siswa->save();
            return redirect('/admin/mastersiswa')->width('pesan', 'data berhasil diubah!');            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        
    }

    public function hapus($id)
    {
        $data=siswa::find($id)->delete();
        return redirect('admin/mastersiswa');

        
    }
}
