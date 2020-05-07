<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Requests\ErrorFormRequest;
use Illuminate\Support\Facades\Hash;
use App\Dosen;
use App\Mahasiswa;

class SuperadminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:superadmin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mhs = Mahasiswa::all();
        $nomor=1;
        return view('superadmin.berandaAdmin',['mhs'=>$mhs,'nomor'=>$nomor]);
    }
    
    public function tambahMahasiswa(){
        return view('superadmin.tambahMahasiswa');
    }

    public function inputTambahMahasiswa(ErrorFormRequest $request){
        $this->validate($request,[
            'nama' => 'required',
            'nim' => 'required|unique:mahasiswas,nim',
            'email' => 'required|unique:mahasiswas,email|email',
            'password'=> 'min:8|required_with:konfirmasi_password|same:konfirmasi_password',
            'konfirmasi_password' => 'min:8',
            'dosen_wali' => 'required',
        ]);

        function maxID(){
            $maha=Mahasiswa::all();
            $max=0;
            foreach($maha as $mahas){
                if($mahas->id > $max){
                    $max=$mahas->id;
                }
            }
            return $max;
        }
        $IDmax=maxID();
        $IDmax=$IDmax+1;
        
        $mhs = new Mahasiswa;
        $mhs->id = $IDmax;
        $mhs->name = $request->nama;
        $mhs->nim = $request->nim;
        $mhs->email = $request->email;
        $mhs->password = Hash::make($request->password);
        $mhs->dosen_wali = $request->dosen_wali;

        $cek = $mhs->save();

        if($cek){
            return redirect('/superadmin')->with('status','Data Mahasiswa Berhasil Ditambahkann!');
        }         
    }

    public function ubahMahasiswa(mahasiswa $mahasiswa){
        return view('superadmin.ubahMahasiswa',['mahasiswa'=>$mahasiswa]);
    }

    public function inputUbahMahasiswa(ErrorFormRequest $request, mahasiswa $mahasiswa){
        $this->validate($request,[
            'nama' => 'required',
            'nim' => 'required',
            'email' => 'required|email',
            'password'=> 'min:8|required_with:konfirmasi_password|same:konfirmasi_password',
            'konfirmasi_password' => 'min:8',
            'dosen_wali' => 'required',
        ]);

        $cek=mahasiswa::where('id',$mahasiswa->id)
            ->update([
                'name' => $request->nama,
                'nim' => $request->nim,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'dosen_wali' => $request->dosen_wali,
            ]);
        if($cek){
            return redirect('/superadmin')->with('status','Data Mahasiswa Berhasil Diubah!');
        }
    }
    
    public function destroyMahasiswa(mahasiswa $mahasiswa){
        if(mahasiswa::destroy($mahasiswa->id))
            return redirect('/superadmin')->with('status','Data Mahasiswa Berhasil Dihapus!');
        else
            dd($mahasiswa);
    }  

    public function aturDosen(){
        $dosen = Dosen::all();
        $nomor=1;
        return view('superadmin.crudDosen',['dosen'=>$dosen,'nomor'=>$nomor]);
    }
    
    public function tambahDosen(){
        return view('superadmin.tambahDosen');
    }

    public function storeDosen(ErrorFormRequest $request){
        $this->validate($request,[
            'nama' => 'required',
            'email' => 'required|unique:dosens,email|email',
            'password'=> 'min:8|required_with:konfirmasi_password|same:konfirmasi_password',
            'konfirmasi_password' => 'min:8',
            'status' => 'required',
        ]);

        function maxID(){
            $maha=Dosen::all();
            $max=0;
            foreach($maha as $mahas){
                if($mahas->id > $max){
                    $max=$mahas->id;
                }
            }
            return $max;
        }
        $IDmax=maxID();
        $IDmax=$IDmax+1;

        $dosen = new Dosen;
        $dosen->id = $IDmax;
        $dosen->name = $request->nama;
        $dosen->email = $request->email;
        $dosen->password = Hash::make($request->password);
        $dosen->status = $request->status;

        $cek = $dosen->save();

        if($cek){
            return redirect('/superadmin/aturdosbing')->with('status','Data Dosen Berhasil Ditambahkann!');
        }      
    }

    public function destroyDosen(dosen $dosen){
        dosen::destroy($dosen->id);

        return redirect('/superadmin/aturdosbing')->with('status','Data Dosen Berhasil Dihapus!');
    }    

    public function editDosen(dosen $dosen){
        return view('superadmin.ubahDosen',['dosen'=>$dosen]);
    }

    public function updateDosen(ErrorFormRequest $request, dosen $dosen){

        $this->validate($request,[
            'nama' => 'required',
            'email' => 'required|email',
            'password'=> 'min:8|required_with:konfirmasi_password|same:konfirmasi_password',
            'konfirmasi_password' => 'min:8',
            'status' => 'required',
        ]);        

        dosen::where('id',$dosen->id)
            ->update([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'status' => $request->status,
            ]);

        return redirect('/superadmin/aturdosbing')->with('status','Data Dosen Berhasil Diubah!');
    }

    public function aturKoorTA(){
        $dosen = Dosen::all();
        $nomor=1;
        return view('superadmin.updateKoorTA',['dosen'=>$dosen,'nomor'=>$nomor]);
    }

    public function updateKoorTA(ErrorFormRequest $request, dosen $dosen){

        if($dosen->status){
            dosen::where('id',$dosen->id)
            ->update([
                'status' => 0,
            ]);
        }else{
            dosen::where('id',$dosen->id)
            ->update([
                'status' => 1,
            ]);
        }
        
        return redirect('/superadmin/aturkoorta')->with('status','Data Koordinator Berhasil Dihapus!');
    }

    public function statistikTA(){
        //Jumlah mahasiswa yang sedang melaksanakan TA (telah melewati tahap pengajuan)
        //merupakan yang sudah berada di tabel mahasiswa
        $mahasiswa_all = mahasiswa::all();
        
        $mahasiswa = [
            'daftarMhs' => $mahasiswa_all->toArray(),
            'jumlahPeserta' => $mahasiswa_all->count()
        ];
        
        //Jumlah dosen TA
        $dosen_all = dosen::all();

        $dosen = [
            'daftarDosen' => $dosen_all->toArray(),
            'jumlahDosen' => $dosen_all->count(),
        ];

        $data = [
            'dosen' =>$dosen,
            'mahasiswa' =>$mahasiswa
        ];

        return view('superadmin.statistikTA', ['data'=>$data]);
    }
}
