<?php

namespace App\Http\Controllers;

use App\Models\Sewa;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function newtestimoni(Request $request)
    {
        $data = Testimonial::create(array_merge($request->except('token', 'submit')));
        if($data->save()){
            return redirect('/profil')->with('succes', 'Terimakasih Telah Berkunjung, Kami Tunggu Kedatangan Anda Kembali');
        }
    }

    public function viewtestimoni($id)
    {
        $booking= Sewa::find($id);
        return view('customer.testimonial', compact(['booking']));
    }
}
