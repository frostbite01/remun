<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use App\Models\Renumeration;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $employee = User::where('role', 'like', '%'.'employee'.'%')->get();
        $renumerasi = Renumeration::all();
        $users = User::paginate(10);
        $jabatan = Jabatan::all();

        return view('admin.pages.dashboard.index', compact('renumerasi','users','employee','jabatan'));
        
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'j_laporan' => 'required',
            'user_id' => 'required',
            'id_jabatan' => 'required',
            'penilaian' => 'required',
            'bonus_retensi' => 'required|max:255',
            'upah_lembur' => 'required|max:255',
            'jam_lembur_total' => 'required|max:255',
            'gaji_pokok' => 'required|max:255',
            'jasa_produksi' => 'required|max:255',
            'triwulan' => 'required|max:255'
        ]);
 
        Renumeration::create($validatedData);
        return redirect('/dashboard-admin')->with(['success' => 'Berhasil Mendambahkan Data!']);
    }
}
