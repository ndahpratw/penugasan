<?php

namespace App\Models;

use App\Models\Sewa;
use App\Models\Pemilik;
use App\Models\Fasilitas;
use App\Models\KostPhoto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kost extends Model
{
    use HasFactory;

    protected $table = 'kosts';
    protected $guards = [];
    protected $fillable=['id','nama','pemilik_id','tersedia','penghuni','harga','image','deskripsi','lokasi','status'];

    public function pemilik()
    {
        return $this->belongsTo(Pemilik::class);
    }

    public function fasilitas()
    {
        return $this->hasMany(Fasilitas::class);
    }

    public function photo()
    {
        return $this->hasMany(KostPhoto::class);
    }

    public function bookings()
    {
        return $this->hasOne(Sewa::class);
    }
}