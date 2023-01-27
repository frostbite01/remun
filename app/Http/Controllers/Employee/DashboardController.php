<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Renumeration;
use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::all();
        $jabatan = Jabatan::all();
        $renumerasi = Renumeration::with('user')->get();
        return view('employee.pages.dashboard.index',compact('user','renumerasi','jabatan'));
    }
}
