<?php

namespace App\Http\Controllers\Frontend;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Mail\sendOtp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{

    public function registerform(){
        return view('frontend.register.register');
    }

    public function processregister(Request $request){
        // echo 'ok';
        // dd($request->all());
        // return $request->input('full_name');
     $this->validate($request, [

        'full_name'=>'required',
        'email'=>'required|email',
        'password'=>'required|min:6',
        'phone'=>'required|min:6|max:13'

     ]);

    // User::create([
        
    // 'full_name'=>$request->full_name,
    // 'email'=> $request->email,
    // 'password'=>bcrypt($request->password),
    // 'mobile_number'=> $request->phone
        
    // ]);

    // notify()->success('Customer Registration successful.');
    //     return redirect()->back();
    // }
    

    $otp = rand(10000, 99999);
    User::Create([
        'full_name'=>$request->full_name,
        'email'=> $request->email,
        'password'=>bcrypt($request->password),
        'mobile_number'=> $request->phone,
        //'role'=>'customer',
        //'phone'=>$request->phone,
         'otp' => $otp,
        'otp_expired_at' => Carbon::now()->addMinutes(5)
    ]);

    Mail::to($request->email)->send(new sendOtp($otp));

    notify()->success('Customer Registration successful.');
    return redirect()->route('showOtp.VerificationForm');
    }




public function showOtpVerificationForm(){
    return view('frontend.customer.otpFrom');
}

public function verifyOtp(Request $request){
    $request->validate([
        'otp' => 'required|numeric',
    ]);
    $code = $request->otp;
    $user = user::where('otp', $code)->first();

    if ($user) {
        // Check if OTP is expired
        if (Carbon::now()->gt($user->otp_expired_at)) {
            // OTP expired
        return redirect()->back()->with('error', 'OTP has expired. Please try again.');
        }

        // OTP is valid and not expired
        $user->is_verified = true;
        // Save the changes to the database
        $user->save(); 
         

        notify()->success('OTP verified successfully. You can now log in.');
        return redirect()->route('customer.login');
     } else {
        // Invalid OTP
        return redirect()->back()->with('error', 'Invalid OTP. Please try again.');
    }
}

    public function login()
    {
        return view('frontend.login.login');
    }

    public function doLogin(Request $request){

        $val=Validator::make($request->all(),[
            'email'=>'required',
            'password'=>'required',
        ]);

        if($val->fails())
        {
            notify()->error($val->getMessageBag());
            return redirect()->back();
        }

        $credentials=$request->except('_token');
        // dd($credentials);

        if(auth()->attempt($credentials))
        {
            notify()->success('Login Success.');
            return redirect()->route('frontend.home');
        }

        notify()->error('Invalid Credentials');
            return redirect()->back();


    }
        
}
 

