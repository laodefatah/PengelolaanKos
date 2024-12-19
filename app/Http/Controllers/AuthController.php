<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Penghuni;


class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.regis');
    }

    public function doLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $role = Auth::user()->role;

            switch ($role) {
                case 'admin':
                    return redirect()->route('dashboard_admin')
                        ->with('success', 'Welcome, Admin!');
                case 'guest':
                    return redirect()->route('landing_page')
                        ->with('success', 'Welcome, Guest!');
                default:
                    Auth::logout();
                    return redirect()->route('login')
                        ->with('error', 'Unauthorized role!');
            }
        }
        // Jika autentikasi gagal
        return redirect()->back()
            ->withInput()
            ->with('error', 'Email atau password salah');
    }

    public function doRegister(Request $request)
    {
        if (User::where('email', $request->email)->exists()) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Email sudah terdaftar. Silahkan gunakan email lain.');
        }
        $request->validate([

            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'guest',
        ]);

        Auth::login($user);

        return redirect()->route('landing_page')->with('success', 'Registration successful. You are now logged in.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('landing_page');
    }
    public function adminDashboard()
{
    if (Auth::check() && Auth::user()->role === 'admin') {
        // Menghitung jumlah penghuni
        $jumlahPenghuni = Penghuni::count();

        // Menghitung jumlah kamar berdasarkan status
        $kamarTersedia = \App\Models\Kamar::where('status', 'tersedia')->count();
        $kamarTerisi = \App\Models\Kamar::where('status', 'terisi')->count();
        // Return view dengan data yang dibutuhkan
        return view('dashboard_admin', [
            'jumlahPenghuni' => $jumlahPenghuni,
            'kamarTersedia' => $kamarTersedia,
            'kamarTerisi' => $kamarTerisi,
        ]);
    }
    abort(403, 'Unauthorized access');
}

    public function guestDashboard()
    {
        $penghuni = Penghuni::All();
        if (Auth::check() && Auth::user()->role === 'guest') {
            return view('landing_page');        }
        abort(403, 'Unauthorized access');
    }
    
}