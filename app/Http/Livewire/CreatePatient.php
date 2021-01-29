<?php

namespace App\Http\Livewire;

use App\Models\Model\patient;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreatePatient extends Component
{
    public $patient;
    public $patientId;
    public $action;
    public $button;

    protected function getRules()
    {

        return array_merge([
            'patient.name' => 'required|min:3',
            'patient.kana' => 'required|min:3',
            'patient.description' => '',
            'patient.address' => '',
            'patient.age' => '',
            'patient.phone_number' => '',
        ]);
    }

    public function createPatient ()
    {
        $this->resetErrorBag();
        $this->validate();

        $created = auth()->user();

        $created_by = $created->id;
        $this->patient['created_by'] = $created_by;
        
        patient::create($this->patient);

        $this->emit('saved');
        $this->reset('patient');
    }

    public function updatePatient ()
    {
        $this->resetErrorBag();
        $this->validate();

        $updated = auth()->user();

        $updated_by = $updated->id;

        patient::find($this->patientId)->forcefill([
            'name' => $this->patient['name'],
            'kana' => $this->patient['kana'],
            'description' => $this->patient['description'],
            'age' => $this->patient['age'],
            'address' => $this->patient['address'],
            'phone_number' => $this->patient['phone_number'],
            'updated_by' => $updated_by,
        ])->save();

        $this->emit('saved');
    }

    public function mount ()
    {
        if (!$this->patient && $this->patientId) {
            $this->patient = patient::find($this->patientId);
        }

        $this->button = create_button($this->action, "Patient");
    }

    public function render()
    {
        return view('livewire.create-patient');
    }
}
