<?php

namespace App\Http\Livewire;

use App\Models\Model\patient_master;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreatePatient_master extends Component
{
    public $patient_master;
    public $patient_masterId;
    public $action;
    public $button;

    protected function getRules()
    {

        return array_merge([
            'patient_master.transition_number' => 'required|min:3',
            'patient_master.patient_id' => 'required|min:3',
            'patient_master.description' => '',
            'patient_master.bed_id' => '',
            'patient_master.user_id' => '',
            'patient_master.entry_date' => '',
            'patient_master.leave_date' => '',
        ]);
    }

    public function createPatientmaster ()
    {
        $this->resetErrorBag();
        $this->validate();

        $created = auth()->user();

        $created_by = $created->id;
        $this->patient_master['created_by'] = $created_by;
        $this->patient_master['transition_number'] = "TN" + $this->patient_master['entry_date'];
        
        patient_master::create($this->patient_master);

        $this->emit('saved');
        $this->reset('patient_master');
    }

    public function updatePatientmaster ()
    {
        $this->resetErrorBag();
        $this->validate();

        $updated = auth()->user();

        $updated_by = $updated->id;

        patient_master::find($this->patient_masterId)->forcefill([
            'transition_number' => $this->patient_master['transition_number'],
            'patient_id' => $this->patient_master['patient_id'],
            'description' => $this->patient_master['description'],
            'bed_id' => $this->patient_master['bed_id'],
            'user_id' => $this->patient_master['user_id'],
            'entry_date' => $this->patient_master['entry_date'],
            'leave_date' => $this->patient_master['leave_date'],
            'updated_by' => $updated_by,
        ])->save();

        $this->emit('saved');
    }

    public function mount ()
    {
        if (!$this->patient_master && $this->patient_masterId) {
            $this->patient_master = patient_master::find($this->patient_masterId);
        }

        $this->button = create_button($this->action, "Patient_master");
    }

    public function render()
    {
        return view('livewire.create-patient_master');
    }
}
