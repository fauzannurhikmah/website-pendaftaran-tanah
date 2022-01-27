<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SertificateRequest extends FormRequest
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
            'nik' => 'required|numeric',
            'name' => 'required|string',
            'date' => 'required|date',
            'gender' => 'required|string',
            'address' => 'required|string',
            'religion' => 'required|string',
            'marital' => 'required|string',
            'profession' => 'required|string',
            'archieve' => optional($this->sertificate)->berkas ? '' : 'required | mimes:pdf, docx, jpg, png, jpeg',
            'status' => 'required|boolean'
        ];
    }
}
