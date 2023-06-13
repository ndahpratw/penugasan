<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $table = 'pengajuans';
    protected $guards = [];
    protected $fillable=['customer_id','subjek','pesan','status'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
