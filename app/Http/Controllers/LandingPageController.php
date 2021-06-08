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
        $repo = Repository::with('user', 'tipe')->paginate(2);
        return view('lp.repo', compact('repo'));
    }
    public function detailRepository($id)
    {
        $repo = Repository::with('user', 'tipe')->findOrFail($id);
        return view('lp.detail-repo', compact('repo'));
    }

    public function search(Request $request)
    {
        if ($request->keywords) {
            $key = $request->keywords;
            $repo = Repository::whereYear('created_at', $key)
                ->orWhere('judul', 'like', "%" . $key . "%")
                ->with('user', 'tipe')->paginate(1);
            $repo->appends(['keywords' => $key]);
            return view('lp.search-repo', compact('repo'));
        }
        return redirect()->route('lp.repo');
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
    public function policy()
    {
        return view('lp.policy');
    }
}