<?php

namespace App\Livewire\Staff;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
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
        $fields = [
            "message" => "Your OTP is: $otp", // Customize the message as needed
            "numbers" => $this->phone,
        ];

        // Send OTP via Fast2SMS API using Laravel HTTP client
        $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($fields),
  CURLOPT_HTTPHEADER => array(
    "authorization:  R7m7Aze8in3xoaaLfSBgcFqvoDdVI7trVsR5pToD7UXCIDXyuNshtdOLBfRV",
    "accept: */*",
    "cache-control: no-cache",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);
dd($response);
curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
        // Handle the response
        if ($response) {
            // OTP sent successfully
            $this->dispatch('otp-sent');
            $this->showOtpForm = false;
            $this->verifyOtpForm=true;
        } else {
            // Failed to send OTP
            session()->flash('error', 'Failed to send OTP. Please try again.');
        }
    }
    public function render()
    {
        return view('livewire.staff.login');
    }
}
