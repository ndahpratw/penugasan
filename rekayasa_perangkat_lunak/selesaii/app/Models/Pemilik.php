<?php

namespace App\Models;

use App\Models\Kost;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pemilik extends Authenticatable
{
    use HasFactory;

    protected $table = 'pemiliks';
    protected $guards = [];
    protected $fillable=['id','username','email','telepon','alamat','image','password'];

    public function kostan()
    {
        return $this->hasMany(Kost::class);
    }
}
