<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;

function uploadFile($file, $name, $upload)
{
    $ext = $file->getClientOriginalExtension();
    if ($file->isValid()) {
        $file_name = str_replace(' ', '_', $name) . '_' . date('YmdHis') . ".$ext";
        $upload_path = $upload;
        $file->move($upload_path, $file_name);
        return $file_name;
    }
    return false;
}

function updateFile($data, $path, $file, $name, $upload_path)
{
    $exist = File::exists(public_path($path . '/' . $data));
    if (isset($data) && $exist) {
        File::delete(public_path($path . '/' . $data));
    }
    $ext = $file->getClientOriginalExtension();
    if ($file->isValid()) {
        $file_name = str_replace(' ', '_', $name) . '_' . date('YmdHis') . ".$ext";
        $file->move($upload_path, $file_name);
        return $file_name;
    }
    return false;
}

function deleteFile($data, $path)
{
    $exist = File::exists(public_path($path . '/' . $data));
    if (isset($data) && $exist) {
        File::delete(public_path($path . '/' . $data));
    }
}

function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

function downloadFile($path, $data)
{
    $file = public_path($path . '/' . $data);
    $headers = [
        'Content-Type' => 'application/pdf',
    ];
    return response()->download($file, $data, $headers);
}