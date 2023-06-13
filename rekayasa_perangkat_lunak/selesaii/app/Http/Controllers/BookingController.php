<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use App\Models\Room;
use App\Models\Sewa;
use App\Models\Booking;
use App\Models\Feature;
use App\Models\Fasilitas;
use App\Models\KostPhoto;
use App\Models\RoomImage;
use App\Models\Facilities;
use Illuminate\Http\Request;
use App\Models\FacilitiesRoom;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    public function newbooking($id, Request $request)
    {
        $request->validate([
            'checkIn' => 'required|date|after:now',
            'checkOut' => 'required|date|after:checkIn',
            'penghuni' => 'required',
            'pesan' => 'required',
            'metode_pembayaran' => 'required',
         ]);

        $booking = Sewa::create([
            'no_booking' => 'BO-'.date('Ymd').rand(1111,9999),
            'customer_id' => auth('user')->user()->id,
            'kost_id' => $request->kost_id,
            'checkIn' => $request->checkIn,
            'checkOut' => $request->checkOut,
            'total' => $request->total,
            'penghuni' => $request->penghuni,
            'pesan' => $request->pesan,
            'metode_pembayaran' => $request->metode_pembayaran,
            'status' => 'dipesan',
            'kondisi' => 'digunakan',
        ]);
        Kost::where('id',$id)->decrement('tersedia','1');
        if ($booking->save()) {
            return redirect('/bookingroom')->with('succes', 'Berhasil Dipesan. Kami Tunggu Kehadiran Anda Saat Check In.');
        };
        // dd($booking);
    }

    public function viewbooking()
    {
        $booking = Sewa::select('*')->whereIn('customer_id', [auth('user')->user()->id])->whereIn('status', ['dipesan', 'dikonfirmasi'])->get();
        return view ('customer.bookingroom', compact(['booking']));
    }

    public function bookingroom($id)
    {
        $kost = Kost::find($id);
        $fasilitas = Fasilitas::where('kost_id',$id)->get();
        $photo = KostPhoto::where('kost_id',$id)->get();
        return view ('customer.booking', compact(['kost','fasilitas','photo']));
    }

    public function viewriwayat()
    {
        $booking = Sewa::select('*')->whereIn('customer_id', [auth('user')->user()->id])->whereIn('status', ['selesai'])->get();
        return view('customer.bookingriwayat',compact(['booking']));
    }

}
