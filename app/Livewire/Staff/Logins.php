<?php

namespace App\Livewire\Staff;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Twilio\Rest\Client;

class Logins extends Component
{
    #[Title('Staff Login')] 
    public $email;
    public $showOtpForm = false;
    public $verifyOtpForm=false;
    public $phone;
    public $password;
    public function guard()
    {
     return Auth::guard('staff');
    }
    protected $rules = [
        'phone' => 'required|digits:10',
    ];
    public function login()
    {

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];
      
        $guard = 'staff';
        if (Auth::guard($guard)->attempt($credentials)) {
            session(['guard' => $guard]);
            
            return redirect('staff/dashboard');
        } else {
            dd("login failed");
        }
    }
    public function toggleAddForm()
    {
        $this->showOtpForm = !$this->showOtpForm;
        
    }
    public function showotpform(){
        $this->showOtpForm = true;
    }
    public function sendOTP(){
        $this->validate();
        $otp = rand(100000, 999999);

        // Save OTP in session or database
        Session::put('password_reset_otp', $otp);
        Session::put('mobile_number', $this->phone);
        $sid    = "ACf524ebfaf450f76ddce0346e43c4b430";
$token  = "92cbbf2ef48bd94b3e0d28fb7685d0d5";
$twilio = new Client($sid, $token);
$verification_check = $twilio->verify->v2->services("VAd251c1bda5a7d447d4fefc61e83cb0ad")
->verificationChecks
->create([
             "to" => "+91".$this->phone."",
             "code" => $otp
         ]
 );

print($verification_check->sid);
        // if ($response) {
        //     // OTP sent successfully
        //     $this->dispatch('otp-sent');
        //     $this->showOtpForm = false;
        //     $this->verifyOtpForm=true;
        // } else {
        //     // Failed to send OTP
        //     session()->flash('error', 'Failed to send OTP. Please try again.');
        // }
    }
    public function render()
    {
        return view('livewire.staff.login');
    }
}
