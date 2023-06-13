<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Pemilik;
use App\Models\Customer;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\Sewa;

class PemilikController extends Controller
{
    public function addpemilik(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'telepon' => 'required|numeric|digits:13',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'image' => 'required',
            'password'=> 'required' 
         ]);

        $data = Pemilik::create(array_merge($request->except('token', 'submit'),[
            'password' => Hash::make($request->password)
        ]));
        if($request->has(('image'))){
            $request->file('image')->move('images/admin', $request->file('image')->getClientOriginalName());
            $data->image = $request->file('image')->getClientOriginalName();
            $data->save();
        }
        if($data->save()){
            return redirect('/profilD')->with('success', 'Data berhasil disimpan. Selamat Datang !');
        }
    }

    public function dashboard()
    {
        $kostan = Kost::all()->where('pemilik_id', auth('pemilik')->user()->id);
        $income = Sewa::select('*')->sum('total');
        $digunakan = DB::table('sewas')->whereIn('status', ['digunakan','dikonfirmasi'])->count();
        $tersedia =  Kost::select('*')->where('pemilik_id', [auth('pemilik')->user()->id])->sum('tersedia');
        $kotor = DB::table('sewas')->whereIn('kondisi', ['kotor'])->count();
        // $fasilitas = DB::table('facilities')->count();
        $testimoni =  Testimonial::all();
        $rating =  DB::table('testimonials')->avg('rating');
        $user = DB::table('users')->count();
        $customer = Customer::limit(5)->orderBy('created_at', 'desc')->get();
        $antrian = Sewa::limit(3)->whereNotIn('status', ['selesai'])->get();
        $linechart = Sewa::selectRaw('count(id) as total_bookings, checkIn')->groupBy('checkIn')->get();
        // $piechart = DB::table('kosts')->join('sewas','sewas.kost_id','=','kosts.id')->select('kosts.jenis_kamar', DB::raw('count(rooms.jenis_kamar) as penggunaan'))->groupBy('rooms.jenis_kamar')->get();

        $label=[];
        $data=[];
        foreach($linechart as $lc){
            $label[]=$lc['checkIn'];
            $data[]=$lc['total_bookings'];
        }

        // $plabels = [];
        // $pdata = [];
        // foreach($piechart as $pc) {
        //     $plabels[]=$pc->jenis_kamar;
        //     $pdata[]=$pc->penggunaan;
        // }
        return view('pemilik.dashboard', compact(['kostan','income','digunakan','tersedia','kotor','testimoni','rating','user','customer','antrian','label','data']));
    }

    public function viewproperti()
    {
        $kostan = Kost::all()->whereIn('pemilik_id', [auth('pemilik')->user()->id]);
        $kost_aktif = Kost::select('status')->where('status', ['aktif'])->whereIn('pemilik_id', [auth('pemilik')->user()->id])->get();
        return view('pemilik.properti', compact('kostan','kost_aktif'));
    }

    public function viewpenghuni()
    {
        $booking = Sewa::select('*')->whereNotIn('status', ['selesai'])->get();
        return view('pemilik.penghuni',compact(['booking']));
    }
    
    public function review()
    {
        $testimonial = Testimonial::all()->whereIn('customer_id', [auth('pemilik')->user()->id]);
        return view('pemilik.review', compact('testimonial'));
    }

    public function destroyreview($id)
    {
        $fasilitas = Testimonial::find($id);
        if ($fasilitas->delete()){
            return redirect('/review')->with('success', 'Review Berhasil Dihapus');
        }
    }

}
