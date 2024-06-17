<?php

namespace App\Livewire\Staff;

use Illuminate\Support\Facades\Storage;
use App\Models\Role;
use App\Models\standard;
use App\Models\Subject;
use App\Models\Staff;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Barryvdh\DomPDF\Facade\Pdf;
use Spatie\PdfToImage\Pdf as PdfToImage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

#[Title('Staff Dashboard')]
class StaffDashboard extends Component
{
    use WithFileUploads;

    public $guard = 'staff';
    public $gender;
    public $phone;
    public $dob;
    public $subject;
    // public $class = [];
    public $profile;
    public $adhaar;
    public $matric;
    public $higher;
    public $graduation;
    public $mastergraduation;
    public $role;
    public $subjects;
    public $classes;
    public $showAddForm;
    public $address;
    public function toggleAddForm()
    {

        if (Auth::guard($this->guard)->user()->details == null) {
            $this->showAddForm = true;

        } else {
            $this->showAddForm = !$this->showAddForm;
            $this->showEditForm = false;
        }
    }
    // #[On('newsubject')]
//    public function newsubject($value){
//         // $this->class = $value;
//         dd($value);
//         // dd($this->class);
//    }
    public function generateIdCard()
    {
        $staff = Staff::find(Auth::guard($this->guard)->user()->id);
        $pdf = Pdf::loadView('pdf/id', compact('staff'));
        $pdfFileName = 'idcard_' . $staff->id . '.pdf';
        $pdfPath = 'idcards/' . $pdfFileName;
        Storage::disk('public')->put($pdfPath, $pdf->output());
        $staff->icard = $pdfPath;
        
        $staff->save();

        //return response()->download(storage_path('app/public/' . $pdfPath));
    }
    public function createRole()
    {
        $staff = Staff::find(Auth::guard($this->guard)->user()->id);

        $validatedData = $this->validate([
            'gender' => 'required',
            'dob' => 'required|date',
            'subject' => 'required',
            'subject.*' => 'exists:subjects,id',
            'phone' => 'required|numeric|digits:10',
            'profile' => 'nullable|image|max:1024',
            'adhaar' => 'nullable|numeric|digits:12',
            'matric' => 'nullable|file|max:2048',
            'higher' => 'nullable|file|max:2048',
            'graduation' => 'nullable|file|max:2048',
            'mastergraduation' => 'nullable|file|max:2048',
            'address' => 'required',
        ]);

        $profilePath = $this->profile ? $this->profile->store('profiles', 'public') : null;

        $staff->gender = $this->gender;
        $staff->dob = $this->dob;
        $staff->photo = $profilePath;
        $staff->adhaarcard = $this->adhaar;
        $staff->phone_number = $this->phone;
        $staff->address = $this->address;
        $staff->details = true;

        $documents = [];

        if ($this->profile) {
            $profilePath = $this->profile->store('profiles', 'public');
            $documents['Profile Photo'] = storage_path('app/public/' . $profilePath);
        }
        if ($this->matric) {
            $matricPath = $this->matric->store('documents', 'public');
            $documents['Matric Marksheet'] = storage_path('app/public/' . $matricPath);
        }
        if ($this->higher) {
            $higherPath = $this->higher->store('documents', 'public');
            $documents['Higher Secondary Marksheet'] = storage_path('app/public/' . $higherPath);
        }
        if ($this->graduation) {
            $graduationPath = $this->graduation->store('documents', 'public');
            $documents['Graduation Certificate'] = storage_path('app/public/' . $graduationPath);
        }
        if ($this->mastergraduation) {
            $mastergraduationPath = $this->mastergraduation->store('documents', 'public');
            $documents['Master Graduation Certificate'] = storage_path('app/public/' . $mastergraduationPath);
        }

        if (!empty($documents)) {
            $pdf = Pdf::loadView('pdf/combined', compact('documents'));
            $pdfFileName = uniqid() . '.pdf';
            $pdfPath = 'documentspdf/' . $pdfFileName;
            Storage::disk('public')->put($pdfPath, $pdf->output());
            $staff->documents = $pdfPath;
        }

        $staff->save();
        $staff->subjects()->sync($this->subject);
        $this->showAddForm = false;
    }


    public function mount()
    {
        $this->role = Role::all();
        $this->subjects = Subject::all();
        $this->classes = standard::all();
        if (Auth::guard($this->guard)->user()->details == null) {
            $this->showAddForm = true;
        } else {
            $this->showAddForm = false;
        }
        // $this->subject = [];
        // $this->class = [];
    }

    public function render()
    {
        return view('livewire.staff.staff-dashboard');
    }
}
