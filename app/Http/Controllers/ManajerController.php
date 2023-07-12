<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormCuti;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ManajerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ManajerDashboard()
    {
        $jumlahBelumDisetujui = FormCuti::where('status_manajer', '-')->wherenot('jabatan','manajer')->wherenot('jabatan','direktur')->wherenot('status_kepalaruang','Tolak')->count();
        $jumlahMenyetujui = FormCuti::where('status_manajer', 'Setuju')->wherenot('jabatan','manajer')->wherenot('jabatan','direktur')->count();
        $jumlahMenolak = FormCuti::where('status_manajer', 'Tolak')->wherenot('jabatan','manajer')->wherenot('jabatan','direktur')->count();

        return view('manajer.dashboardmanajer', compact('jumlahBelumDisetujui','jumlahMenyetujui','jumlahMenolak'));
    }

    public function ManajerProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view ('manajer.manajer_profile',compact('profileData'));
    }

    public function ManajerProfileStore(Request $request)
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

    public function ManajerLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function SyaratCutiManajer()
    {
        return view('manajer.syarat_cuti_manajer');
    }

    public function PengajuanCutiManajer()
    {
        return view('manajer.pengajuan_cuti_manajer');
    }

    public function ApprovalManajer(Request $request)
    {
        if($request->has('search'))
        {
            $data = FormCuti::where('nama','LIKE','%'.$request->search.'%')->simplePaginate(5);
        }
        else {
            $data = FormCuti::where('jabatan', 'Manajer')->orderBy('id','desc')->simplePaginate(5);

        }
        return view('manajer.approval_manajer')->with('data',$data);
        /* return view('pegawai.approval_pegawai'); */
    }

    public function PersetujuanManajer(Request $request)
    {
        if($request->has('search'))
        {
            $data = FormCuti::where('nama','LIKE','%'.$request->search.'%')->simplePaginate(5);
        }
        else {
            $data = FormCuti::wherenot('jabatan', 'Manajer')->wherenot('jabatan', 'Direktur')->orderBy('id','desc')->simplePaginate(5);
        }
       return view('manajer.persetujuan_manajer')->with('data',$data);
    }

    public function DetailCutiManajer()
    {
        return view('manajer.detail_cuti_manajer');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        Session::flash('nama', $request->nama);
        Session::flash('jabatan', $request->jabatan);
        /* Session::flash('divisi', $request->divisi); */
        Session::flash('tgl_mulai', $request->tgl_mulai);
        Session::flash('tgl_selesai', $request->tgl_selesai);
        Session::flash('lama', $request->lama);
        Session::flash('alasan', $request->alasan);
        /* Session::flash('status', $request->status); */

        $request->validate([
            'nama'=>'required',
            'jabatan'=>'required',
            /* 'divisi'=>'required', */
            'tgl_mulai'=>'required',
            'tgl_selesai'=>'required',
            'tgl_selesai'=>'required',  
            'lama'=>'required',   
            'alasan'=>'required',             
        ],[
            'nama.required'=>'Nama wajib diisi',
            'jabatan.required'=>'Jabatan wajib diisi',
            /* 'divisi.required'=>'divisi wajib diisi', */
            'tgl_mulai.required'=>'tgl_mulai wajib diisi',
            'tgl_selesai.required'=>'tgl_selesai wajib diisi',
            'lama.required'=>'lama wajib diisi',
            'alasan.required'=>'Alasan wajib diisi',

        ]);

        $data = [
            'nama'=>$request->nama,
            'jabatan'=>$request->jabatan,
            /* 'divisi'=>$request->divisi, */
            'tgl_mulai'=>$request->tgl_mulai,
            'tgl_selesai'=>$request->tgl_selesai,
            'lama'=>$request->lama,
            'alasan'=>$request->alasan,
        ];
        FormCuti::create($data);
        return redirect()->to('manajer/approvalmanajer');
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
        $data = DB::table('formcuti')->where('nama',$id)->first();
        return view('manajer.edit_pengajuan_manajer',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama'=>'required',
            'jabatan'=>'required',
            /* 'divisi'=>'required', */
            'tgl_mulai'=>'required',
            'tgl_selesai'=>'required',
            'tgl_selesai'=>'required',  
            'lama'=>'required',   
            'alasan'=>'required',             
        ],[
            'nama.required'=>'Nama wajib diisi',
            'jabatan.required'=>'Jabatan wajib diisi',
            /* 'divisi.required'=>'divisi wajib diisi', */
            'tgl_mulai.required'=>'tgl_mulai wajib diisi',
            'tgl_selesai.required'=>'tgl_selesai wajib diisi',
            'lama.required'=>'lama wajib diisi',
            'alasan.required'=>'Alasan wajib diisi',

        ]);

        $data = [
            'nama'=>$request->nama,
            'jabatan'=>$request->jabatan,
            /* 'divisi'=>$request->divisi, */
            'tgl_mulai'=>$request->tgl_mulai,
            'tgl_selesai'=>$request->tgl_selesai,
            'lama'=>$request->lama,
            'alasan'=>$request->alasan,
        ];

       /*  FormCuti::where('nama',$id)->update($data); */
       $data = DB::table('formcuti')->where('id',$id)->update($data);
        return redirect()->to('manajer/approvalmanajer');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data=FormCuti::where('id',$id)->first()->delete();
        return redirect()->back()->with('success','BERHASIL HAPUS DATA');
    }


    public function Accmanajer(string $id)
    {
       $data = DB::table('formcuti')->where('nama',$id)->first();
       return view('manajer.acc_manajer',compact('data'));
    }

    public function Accmanajerupdate(Request $request, string $id)
   {
        $data = FormCuti::where('id', $id)->first();
        $data->update([         
            'status_manajer' =>$request->status_manajer
        ]);
        return redirect()->route('manajer.persetujuanmanajer');
   }
}
