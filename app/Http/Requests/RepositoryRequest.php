<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RepositoryRequest extends FormRequest
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
        if ($this->isMethod('POST')) {
            return [
                'judul' => 'required',
                'tipe_id' => 'required',
                'abstrak' => 'required|string|max:900',
                'file' => 'required|max:5120|mimes:pdf',
            ];
        } else {
            return [
                'judul' => 'required',
                'tipe_id' => 'required',
                'abstrak' => 'required',
                'file' => 'max:5120|mimes:pdf',
            ];
        }
    }

    public function messages()
    {
        return [
            'judul.required' => 'Judul dokumen tidak boleh kosong',
            'tipe_id.required' => 'Jenis dokumen tidak boleh kosong',
            'abstrak.required' => 'Abstrak dokumen tidak boleh kosong',
            'abstrak.max' => 'Abstrak terlalu panjang.',
            'file.required' => 'File dokumen tidak boleh kosong',
            'file.max' => 'Ukuran file dokumen maksimal 5 MB',
            'file.mimes' => 'File harus berupa PDF',
        ];
    }
}