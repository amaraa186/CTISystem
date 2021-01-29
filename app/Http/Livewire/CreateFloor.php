<?php

namespace App\Http\Livewire;

use App\Models\Model\floor;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateFloor extends Component
{
    public $floor;
    public $floorId;
    public $action;
    public $button;

    protected function getRules()
    {

        return array_merge([
            'floor.name' => 'required|min:1',
            'floor.description' => '',
        ]);
    }

    public function createFloor ()
    {
        $this->resetErrorBag();
        $this->validate();

        $created = auth()->user();

        $created_by = $created->id;
        $this->floor['created_by'] = $created_by;

        floor::create($this->floor);

        $this->emit('saved');
        $this->reset('floor');
    }

    public function updateFloor ()
    {
        $this->resetErrorBag();
        $this->validate();  

        $updated = auth()->user();

        $updated_by = $updated->id;

        floor::find($this->floorId)->forcefill([
            'name' => $this->floor['name'],
            'description' => $this->floor['description'],
            'updated_by' => $updated_by,
        ])->save();

        $this->emit('saved');
    }

    public function mount ()
    {
        if (!$this->floor && $this->floorId) {
            $this->floor = floor::find($this->floorId);
        }

        $this->button = create_button($this->action, "Floor");
    }

    public function render()
    {
        return view('livewire.create-floor');
    }
}
