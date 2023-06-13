<?php

namespace App\Models;

use App\Models\Kost;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Testimonial extends Model
{
    use HasFactory;

    protected $table = 'testimonials';
    protected $guards = [];
    protected $fillable=['customer_id','kost_id','rating','testimoni'];

    public function kost()
    {
        return $this->belongsTo(Kost::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
