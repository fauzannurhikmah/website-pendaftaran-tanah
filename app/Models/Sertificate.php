<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Sertificate extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function checkRequestFile()
    {
        if (request()->hasFile('archieve')) {
            return Storage::putFile('archieve', request()->file('archieve'));
            Storage::delete($this->berkas);
        }

        return $this->berkas;
    }
}
