<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $beritas = Berita::all();

        return view('dashboard', compact('beritas'));
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
