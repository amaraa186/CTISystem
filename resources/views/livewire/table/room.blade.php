<?php
use App\Models\Model\floor;
?>
<div>
    <x-data-table :data="$data" :model="$rooms">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    ID
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('name')" role="button" href="#">
                    看護師
                    @include('components.sort-icon', ['field' => 'name'])
                </a></th>
                <th><a wire:click.prevent="sortBy('description')" role="button" href="#">
                    説明
                    @include('components.sort-icon', ['field' => 'description'])
                </a></th>
                <th><a wire:click.prevent="sortBy('floor_id')" role="button" href="#">
                    フロア	
                    @include('components.sort-icon', ['field' => 'floor_id'])
                </a></th>
                <th>アクション</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($rooms as $room)
                @if($room->deleted == 0)
                @php
                $floor_id = floor::where('id', $room->floor_id)->first();
                @endphp
                <tr x-data="window.__controller.dataTableController({{ $room->id }})">
                    <td>{{ $room->id }}</td>
                    <td>{{ $room->name }}</td>
                    <td>{{ $room->description }}</td>
                    <td>{{ $floor_id->name }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="/room/edit/{{ $room->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
                @endif
            @endforeach
        </x-slot>
    </x-data-table>
</div>
