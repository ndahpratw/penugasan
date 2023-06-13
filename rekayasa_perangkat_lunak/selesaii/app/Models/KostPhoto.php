<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KostPhoto extends Model
{
    use HasFactory;

    protected $table = 'kost_photos';
    protected $guards = [];
    protected $fillable=['id','image','kost_id'];

    public function kost()
    {
        return $this->belongsTo(Kost::class);
    }
}
