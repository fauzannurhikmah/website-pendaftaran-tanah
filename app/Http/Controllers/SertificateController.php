<?php

namespace App\Http\Controllers;

use App\Http\Requests\SertificateRequest;
use App\Models\Sertificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SertificateController extends Controller
{
    public function index()
    {
        $sertificates = Sertificate::latest('id')->paginate(10);
        return view('sertificate.index', compact('sertificates'));
    }

    public function create()
    {
        return view('sertificate.create');
    }

    public function store(SertificateRequest $request)
    {
        $archieve = Storage::putFile('archieve', $request->file('archieve'));
        Sertificate::create([
            'nik' => $request->nik,
            'user_id' => auth()->id(),
            'nama' => $request->name,
            'tgl_lahir' => $request->date,
            'gender' => $request->gender,
            'alamat' => $request->address,
            'agama' => $request->religion,
            'status_perkawinan' => $request->marital,
            'pekerjaan' => $request->profession,
            'berkas' => $archieve,
            'status' => $request->status
        ]);
        return back()->with('success', 'New data has been added successfully!');
    }

    public function edit(Sertificate $sertificate)
    {
        return view('sertificate.edit', compact('sertificate'));
    }

    public function update(SertificateRequest $request, Sertificate $sertificate)
    {
        $sertificate->update([
            'nik' => $request->nik,
            'user_id' => $sertificate->user_id ?? auth()->id(),
            'nama' => $request->name,
            'tgl_lahir' => $request->date,
            'gender' => $request->gender,
            'alamat' => $request->address,
            'agama' => $request->religion,
            'status_perkawinan' => $request->marital,
            'pekerjaan' => $request->profession,
            'berkas' => $sertificate->checkRequestFile(),
            'status' => $request->status
        ]);
        return back()->with('success', 'The data has been updated successfully!');
    }

    public function destroy(Sertificate $sertificate)
    {
        Storage::delete($sertificate->berkas);
        $sertificate->delete();
        return back()->with('success', 'The data has been deleted successfully!');
    }
}
