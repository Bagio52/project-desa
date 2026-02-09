<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Galery;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $beritas = Berita::all();
        $galeries = Galery::all();

        return view('dashboard', compact('beritas', 'galeries'));
    }
    public function about()
    {
        return view('about');
    }
    public function berita()
    {
        return view('berita');
    }
    public function galery()
    {
        return view('galery');
    }
}
