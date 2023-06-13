<?php

namespace App\Models;

use App\Models\Kost;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fasilitas extends Model
{
    use HasFactory;

    protected $table = 'fasilitas';
    protected $guards = [];
    protected $fillable=['id','nama','kost_id'];

    public function kost()
    {
        return $this->belongsTo(Kost::class);
    }
}
