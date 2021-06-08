<?php

namespace App\Http\Controllers;

use App\Http\Requests\RepositoryRequest;
use App\Models\Repository;
use App\Models\TipeDokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

use function App\Helpers\deleteFile;
use function App\Helpers\downloadFile;
use function App\Helpers\updateFile;
use function App\Helpers\uploadFile;

class RepositoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->keywords) {
            $key = $request->keywords;
            $data = Repository::whereYear('created_at', $key)
                ->orWhere('judul', 'like', "%" . $key . "%")
                ->with('user', 'tipe')->paginate(10);
            $data->appends(['keywords' => $key]);
            return view('repository.index', compact('data', 'key'));
        }
        $data = Repository::where('user_id', Auth::user()->id)->with('user')->with('user', 'tipe')->paginate(10);
        return view('repository.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipes = TipeDokumen::all();
        return view('repository.create', compact('tipes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RepositoryRequest $request)
    {
        $payload = $request->only(['judul', 'jenis', 'abstrak', 'tipe_id']);
        if ($request->hasFile('file')) {
            $payload['file'] = uploadFile($request->file('file'), $request->judul, 'dokumen');
        }
        $payload['user_id'] = Auth::user()->id;
        Repository::create($payload);
        return redirect()->route('repository.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Repository::with('user', 'tipe')->findOrFail($id);
        return view('repository.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Repository::findOrFail($id);
        $tipes = TipeDokumen::all();
        return view('repository.edit', compact('data', 'tipes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RepositoryRequest $request, $id)
    {
        $payload = $request->only(['judul', 'jenis', 'abstrak', 'tipe_id']);
        $data = Repository::findOrFail($id);
        if ($request->hasFile('file')) {
            $payload['file'] = updateFile($data->file, 'dokumen', $request->file('file'), $request->judul, 'dokumen');
        } else {
            $payload['file'] = $data->file;
        }
        $data->update($payload);
        return redirect()->route('repository.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Repository::findOrFail($id);
        if ($data->file) {
            deleteFile($data->file, 'dokumen');
        }
        $data->delete();
        return redirect()->route('repository.index')->with('success', 'Data berhasil dihapus');
    }

    public function download($id)
    {
        $data = Repository::findOrFail($id)->file;
        return downloadFile('dokumen', $data);
    }
}