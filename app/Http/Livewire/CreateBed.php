<?php

namespace App\Http\Livewire;

use App\Models\Model\bed;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateBed extends Component
{
    public $bed;
    public $bedId;
    public $action;
    public $button;

    protected function getRules()
    {

        return array_merge([
            'bed.name' => 'required|min:1',
            'bed.description' => '',
            'bed.room_id' => '',
            'bed.status' => '',
        ]);
    }

    public function createBed ()
    {
        $this->resetErrorBag();
        $this->validate();

        $created = auth()->user();

        $created_by = $created->id;
        $this->bed['created_by'] = $created_by;

        bed::create($this->bed);

        $this->emit('saved');
        $this->reset('bed');
    }

    public function updateBed ()
    {
        $this->resetErrorBag();
        $this->validate();

        $updated = auth()->user();

        $updated_by = $updated->id;

        bed::find($this->bedId)->forcefill([
            'name' => $this->bed['name'],
            'description' => $this->bed['description'],
            'room_id' => $this->bed['room_id'],
            'status' => $this->bed['status'],
            'updated_by' => $updated_by,
        ])->save();

        $this->emit('saved');
    }

    public function mount ()
    {
        if (!$this->bed && $this->bedId) {
            $this->bed = bed::find($this->bedId);
        }

        $this->button = create_button($this->action, "Bed");
    }

    public function render()
    {
        return view('livewire.create-bed');
    }
}
