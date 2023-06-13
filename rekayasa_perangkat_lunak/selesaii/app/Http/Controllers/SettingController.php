<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use App\Models\Room;
use App\Models\Aboutus;
use App\Models\Customer;
use App\Models\Aboutteam;
use App\Models\Pengajuan;
use App\Models\Aboutcontact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{

    public function viewsetting()
    {
        $info = Aboutus::all();
        $kontak = Aboutcontact::all();
        $team = Aboutteam::all();
        $room = Kost::all();
        $room_aktif = Kost::select('status')->where('status', ['aktif'])->get();
        $room_status = Kost::select('status')->groupBy("status")->get("status");
        return view('admin.setting',compact(['info','kontak','team','room','room_aktif','room_status']));
    }

    public function viewaboutus()
    {
        $aboutteam = Aboutteam::all();
        $aboutus = Aboutus::all();
        $headteam = Aboutteam::limit(1)->get();
        $tersedia =  Kost::select('*')->sum('tersedia');
        $customer =  DB::table('users')->count();
        $testimoni =  DB::table('testimonials')->count();
        $staff =  DB::table('admins')->count();
        return view('customer.aboutus', compact(['aboutteam','aboutus','headteam','tersedia','customer','testimoni','staff']));
    }
    
    public function newteam(Request $request)
    {
        $data = Aboutteam::create(array_merge($request->except('token', 'submit')));
        if($request->has(('image'))){
            $request->file('image')->move('images/profil/', $request->file('image')->getClientOriginalName());
            $data->image = $request->file('image')->getClientOriginalName();
            $data->save();
        } if ($data->save()){
            return redirect('/settingD')->with('succes', 'Data Berhasil Ditambahkan');
        }
    }

    public function destroyteam($id)
    {
        $team = Aboutteam::find($id);
        if ($team->delete()){
            return redirect('/settingD')->with('succes', 'Data Berhasil Dihapus');
        }
    }


    public function viewcontact()
    {
        $aboutcontact = Aboutcontact::limit(1)->get();
        return view('customer.contact', compact(['aboutcontact']));
    }


    public function updateinfo($id, Request $request)
    {
        $request->validate([
            'deskripsi' => 'required',
         ]);

        $info = Aboutus::find($id);
        $info->update($request->except(['token', 'submit']));
        if ($info->save()) {
            return redirect('/settingD')->with('succes', 'Pengaturan Berhasil Diupdate');
        }
    }

    public function updatekontak($id, Request $request)
    {
        $kontak = Aboutcontact::find($id);
        $kontak->update($request->except(['token', 'submit']));
        if ($kontak->save()) {
            return redirect('/settingD')->with('succes', 'Pengaturan Kontak Berhasil Diupdate');
        }
    }

    public function aktif($id)
    {
        Kost::find($id)->update(['status' => 'aktif']);
        return redirect('/properti')->with('success', 'Berhasil Diupdate, Status Kamar Kembali Aktif');
    }
    public function tidakaktif($id)
    {
        Kost::find($id)->update(['status' => 'tidak aktif']);
        return redirect('/properti')->with('success', 'Berhasil Diupdate, Status Kamar Saat Ini Tidak Aktif');
    }

    public function pengajuan(Request $request)
    {
        $data = Pengajuan::create(array_merge($request->except('token', 'submit')));
        if ($data->save()){
            return redirect('/pengajuan')->with('succes', 'Pengajuan Berhasil Dikirim');
        }
    }

    public function pengajuanselesai($id)
    {
        Pengajuan::find($id)->update(['status' => 'selesai']);
        return redirect('/pengajuanD')->with('success', 'Berhasil Diupdate, Status Kamar Saat Ini Tidak Aktif');
    }
}
