<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\FormCuti;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function AdminDashboard()
    {
        $jumlahUser = User::all()->count();
        $totalPengajuan = FormCuti::count();
        return view('admin.dashboardadmin', compact('jumlahUser', 'totalPengajuan'));
    }

    //fungsi cari
    public function CutiAdmin(Request $request)
    {
        
        if($request->has('search'))
        {
            $data = FormCuti::where('nama','LIKE','%'.$request->search.'%')->simplePaginate(5);
        }
        else {
            $data = FormCuti::orderBy('id','desc')->simplePaginate(5);
        }
        return view('admin.cuti_admin')->with('data',$data);

    }


    public function DaftarPegawaAdmin(Request $request)
    {

        if($request->has('search'))
        {
            $data = User::where('name','LIKE','%'.$request->search.'%')->simplePaginate(5);
        }
        else {
            $data = User::orderBy('id','desc')->simplePaginate(5);
        }
        return view('admin.daftarpegawai')->with('data',$data);
    }

    public function AdminLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view ('admin.admin_profile',compact('profileData'));
    }

    public function AdminProfileStore(Request $request)
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
