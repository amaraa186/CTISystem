<?php
use App\Models\Model\bed;
use App\Models\Model\patient;
use App\Models\Model\user;
?>
<div>
    <x-data-table :data="$data" :model="$patient_masters">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    ID
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('transition_number')" role="button" href="#">
                    遷移番号
                    @include('components.sort-icon', ['field' => 'transition_number'])
                </a></th>
                <th><a wire:click.prevent="sortBy('patient_id')" role="button" href="#">
                    患者
                    @include('components.sort-icon', ['field' => 'patient_id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('description')" role="button" href="#">
                    説明
                    @include('components.sort-icon', ['field' => 'description'])
                </a></th>
                <th><a wire:click.prevent="sortBy('bed_id')" role="button" href="#">
                    ベッド
                    @include('components.sort-icon', ['field' => 'bed_id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('user_id')" role="button" href="#">
                    看護師
                    @include('components.sort-icon', ['field' => 'user_id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('entry_date')" role="button" href="#">
                    入院日
                    @include('components.sort-icon', ['field' => 'entry_date'])
                </a></th>
                <th><a wire:click.prevent="sortBy('leave_date')" role="button" href="#">
                    退院日
                    @include('components.sort-icon', ['field' => 'leave_date'])
                </a></th>
                <th>アクション</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($patient_masters as $patient)
                @if($patient->deleted == 0)
                @php
                $user_id = user::where('id', $patient->user_id)->first();
                $bed_id = bed::where('id', $patient->bed_id)->first();
                $patient_id = patient::where('id', $patient->patient_id)->first();
                @endphp
                <tr x-data="window.__controller.dataTableController({{ $patient->id }})">
                    <td>{{ $patient->id }}</td>
                    <td>{{ $patient->transition_number }}</td>
                    <td>{{ $patient_id->name }}</td>
                    <td>{{ $patient->description }}</td>
                    <td>{{ $bed_id->name }}</td>
                    <td>{{ $user_id->name }}</td>
                    <td>{{ $patient->entry_date }}</td>
                    <td>{{ $patient->leave_date }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="/patiant_master/edit/{{ $patient_master->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
                @endif
            @endforeach
        </x-slot>
    </x-data-table>
</div>
