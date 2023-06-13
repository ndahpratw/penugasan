<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use App\Models\Pemilik;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\KostPhoto;
use App\Models\Testimonial;

class KostController extends Controller
{
    public function viewkost()
    {
        $kostan = Kost::all();
        return view('admin.kost_daftar',compact(['kostan']));
    }

    public function newkost()
    {
        $pemilik = Pemilik::all();
        return view('admin.kost_baru',compact(['pemilik']));
    }

    public function addkost(Request $request)
    {
        $data = Kost::create($request->except(['token', 'submit']));
        if($request->has(('image'))){
            $request->file('image')->move('images/preview', $request->file('image')->getClientOriginalName());
            $data->image = $request->file('image')->getClientOriginalName();
            $data->save();
        }
        if ($data->save()) {
            return redirect('/kostN')->with('success', 'Data Kost Berhasil Ditambahkan');
        };
    }

    public function editkost($id)
    {
        $pemilik = Pemilik::all();
        $kost = Kost::find($id);
        return view ('admin.kost_edit', compact(['pemilik','kost']));
    }

    public function updatekost($id, Request $request)
    {
        $data = Kost::find($id);
        $data->update($request->except(['token', 'submit']));
        if($request->has(('image'))){
            $request->file('image')->move('images/photo', $request->file('image')->getClientOriginalName());
            $data->image = $request->file('image')->getClientOriginalName();
            $data->save();
        }
        if ($data->save()){
            return redirect('/kostD')->with('success', 'Data Kost Berhasil Diupdate');
        }
    }

    public function destroykost($id)
    {
        $kost = Kost::find($id);
        if ($kost->delete()){
            return redirect('/kostD')->with('success', 'Kost Terkait Berhasil Dihapus');
        }
    }

    public function detailkost($id)
    {
        $kost = Kost::find($id);
        $fasilitas = Fasilitas::all()->whereIn('kost_id',$id);
        $photo = KostPhoto::all()->whereIn('kost_id',$id);
        return view('admin.kost_detail',compact('kost','fasilitas','photo'));
    }

    // FASILITAS

    public function addfasilitas(Request $request)
    {
        $request->validate([
            'nama' => 'required', 
            'kost_id' => 'required', 
        ]);

        $fasilitas = Fasilitas::create(array_merge($request->except('token', 'submit')));
        if ($fasilitas->save()){
            return redirect('/kostD')->with('success', 'Fasilitas Telah Ditambahkan');
        }
    }
    
    public function destroyfasilitas($id)
    {
        $fasilitas = Fasilitas::find($id);
        if ($fasilitas->delete()){
            return redirect('/kostD')->with('success', 'Fasilitas Terkait Berhasil Dihapus');
        }
    }

    // PHOTO

    public function addphoto(Request $request)
    {
        $request->validate([
            'image' => 'required', 
            'kost_id' => 'required', 
        ]);

        $data = KostPhoto::create(array_merge($request->except('token', 'submit')));
        if($request->has(('image'))){
            $request->file('image')->move('images/photo', $request->file('image')->getClientOriginalName());
            $data->image = $request->file('image')->getClientOriginalName();
            $data->save();
        }
        if ($data->save()){
            return redirect('/kostD')->with('success', 'Gambar Telah Ditambahkan');
        }
    }
    
    public function destroyphoto($id)
    {
        $fasilitas = KostPhoto::find($id);
        if ($fasilitas->delete()){
            return redirect('/kostD')->with('success', 'Gambar Terkait Berhasil Dihapus');
        }
    }

    public function kostdetail($id)
    {
        $kost = Kost::find($id);
        $fasilitas = Fasilitas::all()->whereIn('kost_id',$id);
        $photo = KostPhoto::all()->whereIn('kost_id',$id);
        $testimoni = Testimonial::all()->whereIn('kost_id',$id);
        $rating = DB::table('testimonials')->where('kost_id',$id)->avg('rating');
        return view('customer.kost_detail',compact('kost','fasilitas','photo','testimoni','rating'));
    }

    public function viewkostlist()
    {
        return view('customer.kost',[
            'kost' => Kost::where('tersedia','>','0')->whereNotIn('status', ['tidak aktif'])->get(),
            'status_aktif' => Kost::whereIn('status', ['aktif'])->get()
        ]);
    }

    public function filterkamar(Request $request)
    {
        $request->validate([
            'checkIn' => 'required|date|after:now',
            'checkOut' => 'required|date|after:checkIn',
         ]);

        return view('customer.kamarpesan',[
            'kost' => Kost::where('tersedia','>','0')->whereNotIn('status', ['tidak aktif'])->get(),
            'status_aktif' => Kost::whereIn('status', ['aktif'])->get()
        ]);
        
    }
}
