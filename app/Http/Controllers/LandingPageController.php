<?php

namespace App\Http\Controllers;

use App\Models\Repository;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $repo = Repository::with('user', 'tipe')->limit(4)->get();
        return view('lp.index', compact('repo'));
    }
    public function repository()
    {
        $repo = Repository::with('user', 'tipe')->paginate(10);
        return view('lp.repo', compact('repo'));
    }
    public function about()
    {
        return view('lp.about');
    }
    public function contact()
    {
        return view('lp.contact');
    }
    public function faq()
    {
        return view('lp.faq');
    }
}