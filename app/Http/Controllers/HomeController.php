<?php

namespace App\Http\Controllers;

use App\Http\Requests\SertificateRequest;
use App\Models\Sertificate;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function registration()
    {
        return view('registration');
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
        return view('registration', compact('sertificate'));
    }

    public function update(SertificateRequest $request, Sertificate $sertificate)
    {
        $sertificate->update([
            'nik' => $request->nik,
            'user_id' => auth()->id(),
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
        return back()->with('success', 'New data has been added successfully!');
    }

    public function announcement()
    {
        $sertificate = Sertificate::where('user_id', auth()->id())->paginate(5);
        return view('announcement', compact('sertificate'));
    }

    public function delete(Sertificate $sertificate)
    {
        Storage::delete($sertificate->berkas);
        $sertificate->delete();
        return back()->with('success', 'The data has been deleted successfully!');
    }

    public function download(Sertificate $sertificate)
    {
        return Storage::download($sertificate->berkas);
    }
}
