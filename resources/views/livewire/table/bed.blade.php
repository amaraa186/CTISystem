<?php
use App\Models\Model\room;
use App\Models\Model\bedStatus;
?>
<div>
    <x-data-table :data="$data" :model="$beds">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    ID
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('name')" role="button" href="#">
                    ベッド
                    @include('components.sort-icon', ['field' => 'name'])
                </a></th>
                <th><a wire:click.prevent="sortBy('description')" role="button" href="#">
                    説明
                    @include('components.sort-icon', ['field' => 'description'])
                </a></th>
                <th><a wire:click.prevent="sortBy('room_id')" role="button" href="#">
                    部屋	
                    @include('components.sort-icon', ['field' => 'room_id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('status')" role="button" href="#">
                    ステータス	
                    @include('components.sort-icon', ['field' => 'status'])
                </a></th>
                <th>アクション</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($beds as $bed)
                @if($bed->deleted == 0)
                @php
                $room_id = room::where('id', $bed->room_id)->first();
                $status = bedStatus::where('id', $bed->status)->first();
                @endphp
                <tr x-data="window.__controller.dataTableController({{ $bed->id }})">
                    <td>{{ $bed->id }}</td>
                    <td>{{ $bed->name }}</td>
                    <td>{{ $bed->description }}</td>
                    <td>{{ $room_id->name }}</td>
                    <td>{{ $status->name }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="/bed/edit/{{ $bed->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
                @endif
            @endforeach
        </x-slot>
    </x-data-table>
</div>
