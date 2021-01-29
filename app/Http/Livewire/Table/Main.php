<?php

namespace App\Http\Livewire\Table;

use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;

    public $model;
    public $name;

    public $perPage = 10;
    public $sortField = "id";
    public $sortAsc = false;
    public $search = '';

    protected $listeners = [ "deleteItem" => "delete_item" ];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function get_pagination_data ()
    {
        switch ($this->name) {
            case 'user':
                $users = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.user',
                    "users" => $users,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('user.new'),
                            'create_new_text' => '新しい看護師',
                        ]
                    ])
                ];
                break;

            case 'room':
                $rooms = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.room',
                    "rooms" => $rooms,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('room.new'),
                            'create_new_text' => '新しい部屋',
                        ]
                    ])
                ];
                break;

            case 'floor':
                $floors = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.floor',
                    "floors" => $floors,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('floor.new'),
                            'create_new_text' => '新しいフロア',
                        ]
                    ])
                ];
                break;

            case 'bed':
                $beds = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.bed',
                    "beds" => $beds,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('bed.new'),
                            'create_new_text' => '新しいベッド',
                        ]
                    ])
                ];
                break;

            case 'patient':
                $patients = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.patient',
                    "patients" => $patients,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('patient.new'),
                            'create_new_text' => '新しい患者',
                        ]
                    ])
                ];
                break;

            default:
                $patient_masters = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.patient_master',
                    "patient_masters" => $patient_masters,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('patient_master.new'),
                            'create_new_text' => '新しい患者マスター',
                        ]
                    ])
                ];
                break;
        }
    }

    public function delete_item ($id)
    {
        $data = $this->model::find($id);

        if (!$data) {
            $this->emit("deleteResult", [
                "status" => false,
                "message" => "削除に失敗しました!"
            ]);
            return;
        }

        $updated = auth()->user();

        $updated_by = $updated->id;

        $data->forcefill([
            'deleted' => 1,
            'updated_by' => $updated_by,
        ])->save();
        $this->emit("deleteResult", [
            "status" => true,
            "message" => "正常に削除されました!"
        ]);
    }

    public function render()
    {
        $data = $this->get_pagination_data();

        return view($data['view'], $data);
    }
}
