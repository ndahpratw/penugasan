<?php

namespace App\Models;

use App\Models\Sewa;
use App\Models\Pengajuan;
use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $guards = [];
    protected $fillable=['id','username','email','telepon','alamat','tanggal_lahir','image','password'];

    public function bookings()
    {
        return $this->hasMany(Sewa::class);
    }
    
    public function testimoni()
    {
        return $this->hasMany(Testimonial::class);
    }

    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class);
    }

}
