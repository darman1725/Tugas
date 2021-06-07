<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required',
            'name' => 'required',
            'nim' => 'required|numeric',
            'email' => 'required|email',
            'prodi' => 'required',
            'jurusan' => 'required',
            'phone' => 'required',
            'image' => 'mimes:jpg,jpeg,png|max:3072',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Username harus diisi',
            'nim.required' => 'NIM harus diisi',
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'phone.required' => 'Nomor HP harus diisi',
            'prodi.required' => 'Program studi harus diisi',
            'jurusan.required' => 'Jurusan harus diisi',
            'jurusan.required' => 'Jurusan harus diisi',
            'image.mimes' => 'Gambar harus berupa JPG | PNG',
            'image.max' => 'Ukuran gambar maksmial 3MB',
        ];
    }
}