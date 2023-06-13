<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use App\Models\Room;
use App\Models\User;
use App\Models\Feature;
use App\Models\Customer;
use App\Models\Caraousel;
use App\Models\Fasilitas;
use App\Models\RoomImage;
use App\Models\Facilities;
use App\Models\Testimonial;
use App\Models\Aboutcontact;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;

class CustomerController extends Controller
{

    public function indeks()
    {
        $user = auth('user')->user();
        $kostan = Kost::where('tersedia','>','0')->whereNotIn('status', ['tidak aktif'])->get();
        $carousel = Caraousel::all();
        $cr = Caraousel::all()->count();
        $kontak = Aboutcontact::all();
        $rooms = Kost::limit(3)->get();
        $fasilitas = Fasilitas::limit(3)->get();
        $testimoni = Testimonial::all();
        return view('customer.index',compact(['user','kostan','carousel','kontak','rooms','fasilitas','testimoni']));

        // return Caraousel::all()->count();
        // return Room::with('feature')->get('jenis_kamar');
    }

    public function store(Request $request)
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

        $data = Customer::create(array_merge($request->except('token', 'submit'),[
            'password' => Hash::make($request->password)
        ]));
        if($request->has(('image'))){
            $request->file('image')->move('images/users', $request->file('image')->getClientOriginalName());
            $data->image = $request->file('image')->getClientOriginalName();
            $data->save();
        }
        if($data->save()){
            return redirect('/')->with('succes', 'Data anda berhasil disimpan. Silahkan login!');
        }
    }

    public function login(Request $request)
    {
        $request->validate([
           'email' => 'required|email',
           'password'=> 'required' 
        ]);
        if(Auth::guard('user')->attempt($request->only('email','password'))){
            if($request->has('rememberme')){
                Cookie::queue('emailuser',$request->email,120);
                Cookie::queue('passuser',$request->password,120);
            }
            return redirect('/');
        } 
        elseif(Auth::guard('pemilik')->attempt($request->only('email','password'))){
            return redirect('/adminn');
        } 
        else {
            return redirect('/')->with('wrong', 'Invalid Email and Password !');
        }
    }
    
    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect('/');
    }

    public function profil()
    {
        $user = auth('user')->user();
        return view('customer.profile',compact(['user']));
    }

    public function editprofil($id)
    {
        $user = User::find($id);
        return view ('customer.profileedit', compact(['user']));
    }

    public function updateprofil($id, Request $request)
    {
        $User = Customer::find($id);
        $User->update($request->only(['username','email','telepon','alamat','tanggal_lahir']));
        if ($User->save()){
            return redirect('/profil')->with('succes', 'Data Berhasil Diupdate');
        }
    }

    public function updateimage($id, Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
         ]);

        $User = Customer::find($id);
        $User->update($request->only(['image']));
        if($request->has(('image'))){
            $request->file('image')->move('images/users', $request->file('image')->getClientOriginalName());
            $User->image = $request->file('image')->getClientOriginalName();
            $User->save();
        }
        if ($User->save()){
            return redirect('/profil')->with('succes', 'Profil Berhasil Diupdate');
        }
    }
}
