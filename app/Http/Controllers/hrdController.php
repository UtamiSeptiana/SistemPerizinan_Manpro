<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormCuti;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class hrdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function hrdDashboard()
    {
        $jumlahBelumDisetujui = FormCuti::where('status_hrd', '-')->wherenot('jabatan', 'hrd')->wherenot('status_direktur', 'Tolak')->wherenot('status_kepalaruang','Tolak')->wherenot('status_manajer','Tolak')->count();
        $jumlahMenyetujui = FormCuti::where('status_hrd', 'Setuju')->count();
        $jumlahMenolak = FormCuti::where('status_hrd', 'Tolak')->count();

        return view('hrd.dashboardhrd', compact('jumlahBelumDisetujui','jumlahMenyetujui','jumlahMenolak'));
    }

    public function hrdProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view ('hrd.hrd_profile',compact('profileData'));
    }

    public function hrdProfileStore(Request $request)
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
     
    public function hrdLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function SyaratCutihrd()
    {
        return view('hrd.syarat_cuti_hrd');
    }

    public function PengajuanCutihrd()
    {
        return view('hrd.pengajuan_cuti_hrd');
    }

    public function Approvalhrd(Request $request)
    {
        if($request->has('search'))
        {
            $data = FormCuti::where('nama','LIKE','%'.$request->search.'%')->simplePaginate(5);
        }
        else {
            $data = FormCuti::where('jabatan', 'HRD')->orderBy('id','desc')->simplePaginate(5);

        }
        return view('hrd.approval_hrd')->with('data',$data);
        /* return view('pegawai.approval_pegawai'); */
    }

    public function Persetujuanhrd(Request $request)
    {
        if($request->has('search'))
        {
            $data = FormCuti::where('nama','LIKE','%'.$request->search.'%')->simplePaginate(5);
        }
        else {
            /* $data = FormCuti::orderBy('id','desc')->simplePaginate(5); */
            $data = FormCuti::wherenot('jabatan', 'HRD')->orderBy('id','desc')->simplePaginate(5);
        }
       return view('hrd.persetujuan_hrd')->with('data',$data);
    }

    public function DetailCutihrd()
    {
        return view('hrd.detail_cuti_hrd');
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

    /**
     * Store a newly created resource in storage.
     */
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
        return redirect()->to('hrd/approvalhrd');
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
        return view('hrd.edit_pengajuan_hrd',compact('data'));
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
        return redirect()->to('hrd/approvalhrd');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data=FormCuti::where('id',$id)->first()->delete();
        return redirect()->back()->with('success','BERHASIL HAPUS DATA');
    }

    public function Acchrd(string $id)
    {
       $data = DB::table('formcuti')->where('nama',$id)->first();
       return view('hrd.acc_hrd',compact('data'));
    }

    public function Acchrdupdate(Request $request, string $id)
   {
        $data = FormCuti::where('id', $id)->first();
        $data->update([
            'status_hrd' =>$request->status_hrd
        ]);
        return redirect()->route('hrd.persetujuanhrd');
   }

}
