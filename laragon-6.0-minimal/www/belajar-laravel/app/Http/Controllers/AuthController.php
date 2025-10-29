<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }

        public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:8',
        ], [
            'email.required'    => 'Email wajib diisi!',
            'email.email'       => 'Format email tidak valid!',
            'password.required' => 'Password wajib diisi!',
            'password.min'      => 'Password minimal 8 karakter!',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()
                ->withErrors(['email' => 'Email tidak ditemukan'])
                ->withInput();
        }
        if (!Hash::check($request->password, $user->password)) {
            return back()
                ->withErrors(['password' => 'Password salah'])
                ->withInput();
        }

        session([
            'user_id'   => $user->id,
            'user_name' => $user->name,
            'user_email'=> $user->email,
        ]);

        return redirect()->route('dashboard')
                         ->with('success', 'Login berhasil! Selamat datang, ' . $user->name);
    }

    /**
     * Logout user.
     */
    public function logout()
    {
        session()->flush(); // hapus semua data session
        return redirect()->route('login')->with('success', 'Anda telah logout.');
    }
}

