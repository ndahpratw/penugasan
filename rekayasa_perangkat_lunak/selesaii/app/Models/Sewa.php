<?php

namespace App\Models;

use App\Models\Kost;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sewa extends Model
{
    use HasFactory;

    protected $table = 'sewas';
    protected $guards = [];
    protected $fillable=['no_booking','customer_id','kost_id','checkIn','checkOut','total','penghuni','pesan','metode_pembayaran','status','kondisi'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function kost()
    {
        return $this->belongsTo(Kost::class);
    }
}
