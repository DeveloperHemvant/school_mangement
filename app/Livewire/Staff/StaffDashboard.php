<?php

namespace App\Livewire\Staff;
use Illuminate\Support\Facades\Storage;
use App\Models\Role;
use App\Models\standard;
use App\Models\Subject;
use App\Models\Staff;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;


class StaffDashboard extends Component
{
    use WithFileUploads;

    public $guard = 'staff';
    public $gender;
    public $phone;
    public $dob;
    public $subject ;
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
            
        }else{
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
    public function createRole(){
        $staff = Staff::find(Auth::guard($this->guard)->user()->id);
        $validatedData = $this->validate([
            'gender' => 'required',
            'dob' => 'required|date',
            'subject' => 'required',
            'subject.*' => 'exists:subjects,id',
            'phone' => 'required|numeric|digits:12',
            // 'class.*' => 'exists:standards,id',
            'profile' => 'nullable|image|max:1024', // Example validation rules, adjust as per your requirements
            'adhaar' => 'nullable|numeric',
            'matric' => 'nullable|file|max:2048',
            'higher' => 'nullable|file|max:2048',
            'graduation' => 'nullable|file|max:2048',
            'mastergraduation' => 'nullable|file|max:2048',
            'address'=>'required',
        ]);
        // dd( $validatedData);
      
        // Store profile photo if provided
        $profilePath = null;
        if ($this->profile) {
            $profilePath = $this->profile->store('profiles', 'public');
        }

        // Create Staff record

        $staff->gender = $this->gender;
        $staff->dob = $this->dob;
        $staff->photo = $profilePath; // Store profile photo path
        $staff->adhaarcard = $this->adhaar;
        $staff->phone_number = $this->phone;
        $staff->address = $this->address;
        $staff->details = true;
        $matricPath = $this->matric ? $this->matric->store('temp') : null;
        $higherPath = $this->higher ? $this->higher->store('temp') : null;
        $graduationPath = $this->graduation ? $this->graduation->store('temp') : null;
        $mastergraduationPath = $this->mastergraduation ? $this->mastergraduation->store('temp') : null;

        // Combine files into one PDF
        $combinedPdfPath = $this->combinePdfs([$matricPath, $higherPath, $graduationPath, $mastergraduationPath]);
        $staff->documents = $combinedPdfPath; 
        $staff->save();
        $staff->subjects()->attach($this->subject);
        // $staff->standards()->attach($this->class);
    }
    private function combinePdfs(array $combinedPdfPath)
    {
        $pdf = PDF::loadView('pdf.combined', ['pdfPaths' => $combinedPdfPath]);
        $outputPath = 'combined_documents/'.uniqid().'.pdf';
        // $pdf->save(storage_path('app/'.$outputPath));
        Storage::disk('public')->put($outputPath, $pdf->output());
        // Delete temporary files
        foreach ($combinedPdfPath as $path) {
            if ($path) {
                \Storage::delete($path);
            }
        }

        return $outputPath;
    }
    
    private function storeFile($file)
    {
        if ($file) {
            return $file->store('uploads', 'public');
        }
        return null;
    }
    public function mount(){
        $this->role = Role::all();
        $this->subjects = Subject::all();
        $this->classes = standard::all();
        if (Auth::guard($this->guard)->user()->details == null) {
            $this->showAddForm = true;   
        }else{
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
