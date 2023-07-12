<?php

namespace App\Http\Controllers;

use App\Models\FormCuti;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function PegawaiDashboard()
    {
        return view('pegawai.dashboardpegawai');
    }

    public function SyaratCutiPegawai()
    {
        return view('pegawai.syarat_cuti_pegawai');
    }

    public function PengajuanCutiPegawai()
    {
        return view('pegawai.pengajuan_cuti_pegawai');
    }

    public function ApprovalPegawai(Request $request)
    {
        if($request->has('search'))
        {
            $data = FormCuti::where('nama','LIKE','%'.$request->search.'%')->simplePaginate(5);
        }
        else {
            /* $data = FormCuti::orderBy('id','desc')->simplePaginate(5); */
            $data = FormCuti::where('jabatan', 'Pegawai')->orderBy('id','desc')->simplePaginate(5);
        }
        return view('pegawai.approval_pegawai')->with('data',$data);  
    }

    public function PegawaiLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }


    public function PegawaiProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view ('pegawai.pegawai_profile',compact('profileData'));
    }

    public function PegawaiProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->telepon = $request->telepon;
        $data->alamat = $request->alamat;
        $data->password = $request->password;
        
        if ($request->file('foto'))
        {
            $file = $request->file('foto');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['foto'] = $filename;
        }

        $data->save();
        return redirect()->back();
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pegawai.pengajuan_cuti_pegawai');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nama', $request->nama);
        Session::flash('jabatan', $request->jabatan);
        Session::flash('divisi', $request->divisi);
        Session::flash('tgl_mulai', $request->tgl_mulai);
        Session::flash('tgl_selesai', $request->tgl_selesai);
        Session::flash('lama', $request->lama);
        Session::flash('alasan', $request->alasan);

        $request->validate([
            'nama'=>'required',
            'jabatan'=>'required',
            'divisi'=>'required',
            'tgl_mulai'=>'required',
            'tgl_selesai'=>'required',
            'tgl_selesai'=>'required',  
            'lama'=>'required',   
            'alasan'=>'required',             
        ],[
            'nama.required'=>'Nama wajib diisi',
            'jabatan.required'=>'Jabatan wajib diisi',
            'divisi.required'=>'divisi wajib diisi',
            'tgl_mulai.required'=>'tgl_mulai wajib diisi',
            'tgl_selesai.required'=>'tgl_selesai wajib diisi',
            'lama.required'=>'lama wajib diisi',
            'alasan.required'=>'Alasan wajib diisi',

        ]);

        $data = [
            'nama'=>$request->nama,
            'jabatan'=>$request->jabatan,
            'divisi'=>$request->divisi,
            'tgl_mulai'=>$request->tgl_mulai,
            'tgl_selesai'=>$request->tgl_selesai,
            'lama'=>$request->lama,
            'alasan'=>$request->alasan,
        ];
        FormCuti::create($data);
        return redirect()->to('pegawai/approvalpegawai');
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

    public function edit(string $id)
    {
        /* $data = FormCuti::where('id',$id)->first(); */
        $data = DB::table('formcuti')->where('nama',$id)->first();
        return view('pegawai.edit_pengajuan_pegawai',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama'=>'required',
            'jabatan'=>'required',
            'divisi'=>'required',
            'tgl_mulai'=>'required',
            'tgl_selesai'=>'required',
            'tgl_selesai'=>'required',  
            'lama'=>'required',   
            'alasan'=>'required',             
        ],[
            'nama.required'=>'Nama wajib diisi',
            'jabatan.required'=>'Jabatan wajib diisi',
            'divisi.required'=>'divisi wajib diisi',
            'tgl_mulai.required'=>'tgl_mulai wajib diisi',
            'tgl_selesai.required'=>'tgl_selesai wajib diisi',
            'lama.required'=>'lama wajib diisi',
            'alasan.required'=>'Alasan wajib diisi',

        ]);

        $data = [
            'nama'=>$request->nama,
            'jabatan'=>$request->jabatan,
            'divisi'=>$request->divisi,
            'tgl_mulai'=>$request->tgl_mulai,
            'tgl_selesai'=>$request->tgl_selesai,
            'lama'=>$request->lama,
            'alasan'=>$request->alasan,
        ];

       /*  FormCuti::where('nama',$id)->update($data); */
       $data = DB::table('formcuti')->where('id',$id)->update($data);
        return redirect()->to('pegawai/approvalpegawai');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $data=FormCuti::where('id',$id)->first()->delete();
        return redirect()->back()->with('success','BERHASIL HAPUS DATA');
    }
}
