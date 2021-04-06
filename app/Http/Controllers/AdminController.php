<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\KlasemenModel;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->KlasemenModel = new KlasemenModel();
    }

    public function index()
    {

        $klasemen = KlasemenModel::orderBy('jumlah_point', 'DESC')->get();

        return Inertia::render('dashboard', [
            'klasemen' => $klasemen
        ]);
    }

    public function store(Request $request)
    {
        $klasemen = new KlasemenModel();
        $klasemen->nama_klub = $request->nama_klub;
        $klasemen->main = $request->main;
        $klasemen->menang = $request->menang;
        $klasemen->seri = $request->seri;
        $klasemen->kalah = $request->kalah;
        $klasemen->jumlah_point = ($request->menang * 3) + $request->seri;

        $klasemen->save();

        return redirect(route('admin/dashboard'));
    }

    public function about()
    {
        $pesan = "Hai apa kabar";
        return Inertia::render('about', [
            'pesan' => $pesan,
            'copyright' => '2021'
        ]);
    }

    public function create()
    {
        return Inertia::render('form', []);
    }

    public function contact()
    {
        return Inertia::render('contact', []);
    }
}
