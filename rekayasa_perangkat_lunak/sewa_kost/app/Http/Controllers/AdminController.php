<?php

namespace App\Http\Controllers;
use App\Models\Kost;
use App\Models\Room;
use App\Models\User;
use App\Models\Admin;
use App\Models\Booking;
use App\Models\Pemilik;
use App\Models\Customer;
use App\Models\Pengajuan;
// use Carbon\Carbon;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function indeks()
    {
        return view('admin.index');
    }
    
    public function login(Request $request)
    {
        $request->validate([
           'email' => 'required',
           'password'=> 'required' 
        ]);
        if (Auth::guard('admin')->attempt($request->only('email','password'))) {
            return redirect('/adminn');
        }
        else {
            return redirect('/adminn')->with('wrong', 'Invalid Email and Password ! Try Again');
        }
    }

    public function logout()
    {
        if (auth('pemilik')->user() == true) {
            Auth::guard('pemilik')->logout();
            return redirect('/');
        }
        else {
            Auth::guard('admin')->logout();
            return redirect('/admin');
        }
    }

    public function profil()
    {
        $admin = auth('admin')->user();
        return view('admin.profile',compact(['admin']));
    }

    public function addadmin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'telepon' => 'required|numeric|digits:12',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'image' => 'required',
            'password'=> 'required' 
         ]);

        $data = Admin::create(array_merge($request->except('token', 'submit'),[
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

    public function editprofil($id)
    {
        $admin = Admin::find($id);
        return view ('admin.profileedit', compact(['admin']));
    }

    public function updateprofil($id, Request $request)
    {
        $User = Admin::find($id);
        $User->update($request->only(['username','email','telepon','alamat','tanggal_lahir']));
        if ($User->save()){
            return redirect('/profilD')->with('succes', 'Profil Berhasil Diupdate');
        }
    }

    public function updateimage($id, Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
         ]);

        $User = Admin::find($id);
        $User->update($request->only(['image']));
        if($request->has(('image'))){
            $request->file('image')->move('images/profil', $request->file('image')->getClientOriginalName());
            $User->image = $request->file('image')->getClientOriginalName();
            $User->save();
        }
        if ($User->save()){
            return redirect('/profilD')->with('succes', 'Profil Berhasil Diupdate');
        }
    }

    public function user()
    {
        $admin = Admin::all();
        $customer = Customer::all();
        $pemilik = Pemilik::all();
        return view('admin.user',compact('admin','customer','pemilik'));
    }

    public function editantriankonfirmasi($id)
    {
        DB::table('sewas')->where('id',$id)->update(['status' => 'dikonfirmasi']);
        return redirect('/penghuni');
    }
    public function editantrianbatalkan($id)
    {
        DB::table('sewas')->where('id',$id)->update(['status' => 'dipesan']);
        return redirect('/penghuni');
    }
    public function editantrianselesai($id)
    {
        DB::table('sewas')->where('id',$id)->update(['status' => 'selesai']);
        // DB::table('sewas')->where('id',$id)->update(['kondisi' => 'kotor']);
        Kost::where('id',$id)->increment('tersedia','1');
        return redirect('/bookingriwayat');
    }
    public function editantriankamarkotor1($id)
    {
        Kost::where('id',$id)->increment('tersedia','1');
        return redirect('/kamarR')->with('succes', 'Kamar Kembali Tersedia, Silahkan Konfirmasi Kembali');
    }
    
    public function editantriankamarkotor2($id)
    {
        DB::table('bookings')->where('id',$id)->update(['kondisi' => 'available']);
        return redirect('/kamarR');
    }

    public function viewpengajuan()
    {
        $pengajuan = Pengajuan::all()->whereIn('status','diproses');
        return view('admin.pengajuan', compact('pengajuan'));
    }
}
