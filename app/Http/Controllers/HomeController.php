<?php

namespace App\Http\Controllers;

use App\Models\AlatTelemetri;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pemeriksaan;
use App\Models\Pemeliharaan;
use App\Models\Pemeliharaan2;
use App\Models\JenisAlat;
use App\Models\Setting2;
use App\Models\Komponen2;
use App\Models\JenisPeralatan;
use App\Models\PeralatanTelemetri;
use App\Models\Komponen;
use App\Models\Setting;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'title' => 'Home',
            'menu' => 'home',
            'submenu' => '',
            'type' => 'home',
            'countUser' => User::count('id'),
            'countPemeriksaan' => Pemeriksaan::count('id'),
            'countPemeliharaan' => Pemeliharaan2::count('id'),
            'countJenisPeralatan' => JenisAlat::count('id'),
            'countPeralatanTelemetri' => AlatTelemetri::count('id'),
            'countKomponen' => Komponen2::count('id'),
            'countSetting' => Setting2::count('id'),
            'pemeliharaans' => Pemeliharaan2::latest()->limit(5)->get() // Limit to 5 recent records
        ];
        return view('home', $data);
    }
}
