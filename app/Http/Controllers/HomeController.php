<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pemeriksaan;
use App\Models\Pemeliharaan;
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
            'countPemeliharaan' => Pemeliharaan::count('id'),
            'countJenisPeralatan' => JenisPeralatan::count('id'),
            'countPeralatanTelemetri' => PeralatanTelemetri::count('id'),
            'countKomponen' => Komponen::count('id'),
            'countSetting' => Setting::count('id'),
            'countPemeliharaan' => Pemeliharaan::count('id'),
            'pemeliharaans' => Pemeliharaan::latest()->limit(5)->get() // Limit to 5 recent records
        ];
        return view('home', $data);
    }
}
