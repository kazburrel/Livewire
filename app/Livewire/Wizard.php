<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Wizard extends Component
{
    use WithFileUploads;

    public $currentStep = 1;
    // public $name, $amount, $description, $status = 1, $stock;
    public $successMessage = '';
    
    #[Rule('required|unique:products')]
    public string $name = '';

    #[Rule('required|numeric')]
    public string $amount = ''; 
    
    #[Rule('required|min:5')]
    public string $description = '';
    
    #[Rule('required|min:5')]
    public string $stock = ''; 
    
    #[Rule('required')]
    public string $status = '';
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    // public function render()
    // {
    //     return view('livewire.wizard');
    // }
  
    /**
     * Write code on Method
     *
     * @return response()
     */

    // public $first_name;
    // public $last_name;
    // public $gender;
    // public $age;
    // public $description;
    // public $email;
    // public $phone;
    // public $country;
    // public $city;
    // public $frameworks = [];
    // public $cv;
    // public $terms;

    public $totalSteps = 4;
    public $currentStep = 1;


    public function mount(){
        $this->currentStep = 1;
    }


    public function render()
    {
        return view('livewire.multi-step-form');
    }

    public function increaseStep(){
        $this->resetErrorBag();
        $this->validateData();
         $this->currentStep++;
         if($this->currentStep > $this->totalSteps){
             $this->currentStep = $this->totalSteps;
         }
    }

    public function decreaseStep(){
        $this->resetErrorBag();
        $this->currentStep--;
        if($this->currentStep < 1){
            $this->currentStep = 1;
        }
    }

    public function validateData(){

        if($this->currentStep == 1){
            $this->validate([
                'first_name'=>'required|string',
                'last_name'=>'required|string',
                'gender'=>'required',
                'age'=>'required|digits:2'
            ]);
        }
        elseif($this->currentStep == 2){
              $this->validate([
                 'email'=>'required|email|unique:students',
                 'phone'=>'required',
                 'country'=>'required',
                 'city'=>'required'
              ]);
        }
        elseif($this->currentStep == 3){
              $this->validate([
                  'frameworks'=>'required|array|min:2|max:3'
              ]);
        }
    }

    public function register(){
          $this->resetErrorBag();
          if($this->currentStep == 4){
              $this->validate([
                  'cv'=>'required|mimes:doc,docx,pdf|max:1024',
                  'terms'=>'accepted'
              ]);
          }

          $cv_name = 'CV_'.time().$this->cv->getClientOriginalName();
          $upload_cv = $this->cv->storeAs('students_cvs', $cv_name);

          if($upload_cv){
              $values = array(
                  "first_name"=>$this->first_name,
                  "last_name"=>$this->last_name,
                  "gender"=>$this->gender,
                  "email"=>$this->email,
                  "phone"=>$this->phone,
                  "country"=>$this->country,
                  "city"=>$this->city,
                  "frameworks"=>json_encode($this->frameworks),
                  "description"=>$this->description,
                  "cv"=>$cv_name,
              );

              Student::insert($values);
            //   $this->reset();
            //   $this->currentStep = 1;
            $data = ['name'=>$this->first_name.' '.$this->last_name,'email'=>$this->email];
            return redirect()->route('registration.success', $data);
          }
    }
}
