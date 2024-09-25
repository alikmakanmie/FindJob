<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationCode;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use App\Events\VerificationCodeSent;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function showVerificationForm()
    {
        return view('auth.verify');
    }

    public function sendVerificationCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->email;
        $code = Str::random(6);

        // Simpan kode di cache
        Cache::put('verification_code_' . $email, $code, now()->addMinutes(10));

        // Kirim kode verifikasi menggunakan Pusher
        event(new VerificationCodeSent($email, $code));

        return response()->json(['message' => 'Kode verifikasi telah dikirim.']);
    }

    public function verifyCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'code' => 'required|string',
        ]);

        $email = $request->email;
        $code = $request->code;

        $cachedCode = Cache::get('verification_code_' . $email);

        if ($cachedCode && $cachedCode === $code) {
            Cache::forget('verification_code_' . $email);
            return response()->json(['message' => 'Kode verifikasi valid.']);
        }

        return response()->json(['message' => 'Kode verifikasi tidak valid.'], 422);
    }

    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();

        // Tambahkan logika tambahan di sini jika diperlukan
        // Misalnya, memberikan poin atau badge kepada pengguna

        return redirect()->route('verification.success');
    }

    public function showSuccess()
    {
        return view('auth.verification-success');
    }
}
