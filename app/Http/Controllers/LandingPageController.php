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
}