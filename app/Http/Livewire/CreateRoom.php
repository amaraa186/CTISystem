<?php

namespace App\Http\Livewire;

use App\Models\Model\room;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateRoom extends Component
{
    public $room;
    public $roomId;
    public $action;
    public $button;

    protected function getRules()
    {

        return array_merge([
            'room.name' => 'required|min:1',
            'room.description' => '',
            'room.floor_id' => '',
        ]);
    }

    public function createRoom ()
    {
        $this->resetErrorBag();
        $this->validate();

        $created = auth()->user();

        $created_by = $created->id;
        $this->room['created_by'] = $created_by;

        room::create($this->room);

        $this->emit('saved');
        $this->reset('room');
    }

    public function updateRoom ()
    {
        $this->resetErrorBag();
        $this->validate();

        $updated = auth()->user();

        $updated_by = $updated->id;

        room::find($this->roomId)->forcefill([
            'name' => $this->room['name'],
            'description' => $this->room['description'],
            'floor_id' => $this->room['floor_id'],
            'updated_by' => $updated_by,
        ])->save();

        $this->emit('saved');
    }

    public function mount ()
    {
        if (!$this->room && $this->roomId) {
            $this->room = room::find($this->roomId);
        }

        $this->button = create_button($this->action, "Room");
    }

    public function render()
    {
        return view('livewire.create-room');
    }
}
