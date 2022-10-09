<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\Peserta;
use App\Models\Pengajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rules\Password;

class AkunController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:akun'],
            'password' => ['required', 'confirmed', Password::defaults()],
            'role' => ['required']
        ]);
        
        DB::beginTransaction();
        try {
            $user = Akun::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            if($request->role=='pengajar'){
                Pengajar::create([
                    'akun_id' => $user->id,
                ]);
            }elseif($request->role=='peserta'){
                Peserta::create([
                    'akun_id' => $user->id,
                    'nickname' => $request->nama,
                ]);
            }
            

            $user->sendEmailVerificationNotification();
        } catch (\Throwable $th) {
            dd($th->getMessage());
            Alert::error("Error", "Something went wrong");
            DB::rollBack();
            return back();
        }


        DB::commit();

        Auth::login($user);
        Alert::success('Berhasil', 'Akun berhasil dibuat');
        return redirect('/');
    }

    public function authenticate(Request $request){
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }else{
            Alert::error('Gagal', 'Email atau password salah');
        }
        return back();
    }




}
